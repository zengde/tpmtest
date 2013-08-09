//ThinkTemplate 用js实现了ThinkPHP的模板引擎。
//用户可以在手机客户端中用ThinkPHP的模板引擎。
//@author luofei614<http://weibo.com/luofei614>
//
var ThinkTemplate={
    tags:['Include','Volist','Foreach','For','Empty','Notempty','Present','Notpresent','Compare','If','Elseif','Else','Swith','Case','Default','Var','Range'],
	parse:function(tplContent,vars){
	var render=function(){
		tplContent='<% var key,mod=0;%>'+tplContent;//定义模板中循环需要使用的到变量	
        $.each(ThinkTemplate.tags,function(k,v){
            tplContent=ThinkTemplate['parse'+v](tplContent);
        });  
		return ThinkTemplate.template(tplContent,vars);
		};
		
		return render();
	},
	//解析 <% %> 标签
	template:function(text,vars){
		var source="";
		var index=0;
		var escapes = {
			"'":      "'",
			'\\':     '\\',
			'\r':     'r',
			'\n':     'n',
			'\t':     't',
			'\u2028': 'u2028',
			'\u2029': 'u2029'
		};
		var escaper = /\\|'|\r|\n|\t|\u2028|\u2029/g;
		text.replace(/<%=([\s\S]+?)%>|<%([\s\S]+?)%>/g,function(match,interpolate,evaluate,offset){
			var p=text.slice(index,offset).replace(escaper,function(match){
				return '\\'+escapes[match];
			});
			if(''!=$.trim(p)){
				source+="__p+='"+p+"';\n";	
			}

			if(evaluate){
				source+=evaluate+"\n";
			}	
			if(interpolate){
				source+="if( 'undefined'!=typeof("+interpolate+") && (__t=(" + interpolate + "))!=null) __p+=__t;\n";
			}
			index=offset+match.length;
			return match;
		});
		source+="__p+='"+text.slice(index).replace(escaper,function(match){ return '\\'+escapes[match]; })+"';\n";//拼接剩余的字符串

		source = "var __t,__p='',__j=Array.prototype.join," +
			"print=function(){__p+=__j.call(arguments,'');};\n" +
			"with(obj){\n"+
			source + 
			"}\n"+
			"return __p;\n";
		try {
			render = new Function('obj', source);

		} catch (e) {
			e.source = source;
			throw e;
		}
		return render(vars);
	},
	parseVar:function(tplContent){
		var matcher=/\{\$(.*?)\}/g
			return tplContent.replace(matcher,function(match,varname,offset){
				//支持定义默认值
				if(varname.indexOf('|')!=-1){
					var arr=varname.split('|');
					var name=arr[0];
					var defaultvalue='""';
					arr[1].replace(/default=(.*?)$/ig,function(m,v,o){
						defaultvalue=v;
					});
					return '<% '+name+'?print('+name+'):print('+defaultvalue+');  %>';
				}
				return '<%='+varname+'%>';
			});	
	},
    //include标签解析 路径需要写全，写为 Action:method, 暂不支持变量。 
    parseInclude:function(tplContent){
		var include=/<include (.*?)\/?>/ig;
        tplContent=tplContent.replace(include,function(m,v,o){
            var $think=$('<think '+v+' />');
            var file=$think.attr('file').replace(':','/')+'.html';
            var content='';
            //加载模板
            $.ajax({
                dataType:'text',
                url:file,
                cache:false,
                async:false,//同步请求
                success:function(d,s,x){
                    content=d;
                },
                error:function(){
                    //pass
                }
            });
            return content;
        });
        tplContent=tplContent.replace('</include>','');//兼容浏览器中元素自动闭合的情况
        return tplContent;
    },
	//volist标签解析
	parseVolist:function(tplContent){
		var voliststart=/<volist (.*?)>/ig;
		var volistend=/<\/volist>/ig;
		//解析volist开始标签
		tplContent=tplContent.replace(voliststart,function(m,v,o){
			//属性分析
			var $think=$('<think '+v+' />');
			var name=$think.attr('name');
			var id=$think.attr('id');
			var empty=$think.attr('empty')||'';
			var key=$think.attr('key')||'i';	
			var mod=$think.attr('mod')||'2';
			//替换为代码
			return '<% if("undefined"==typeof('+name+') || ThinkTemplate.empty('+name+')){'+
				' print(\''+empty+'\');'+
			' }else{ '+
				key+'=0;'+
			' $.each('+name+',function(key,'+id+'){'+
				' mod='+key+'%'+mod+';'+
				' ++'+key+';'+
				' %>';
			});
		//解析volist结束标签
		tplContent=tplContent.replace(volistend,'<% }); } %>');
		return tplContent;
	},
	//解析foreach标签
	parseForeach:function(tplContent){
		var foreachstart=/<foreach (.*?)>/ig;
		var foreachend=/<\/foreach>/i;	
		tplContent=tplContent.replace(foreachstart,function(m,v,o){
			var $think=$('<think '+v+' />');	
			var name=$think.attr('name');
			var item=$think.attr('item');
			var key=$think.attr('key')||'key';
			return '<% $.each('+name+',function('+key+','+item+'){  %>'
			});
			tplContent=tplContent.replace(foreachend,'<% }); %>');
		return tplContent;
	},
	parseFor:function(tplContent){
		var forstart=/<for (.*?)>/ig;
		var forend=/<\/for>/ig;
		tplContent=tplContent.replace(forstart,function(m,v,o){
			var $think=$('<think '+v+' />');	
			var name=$think.attr('name') || 'i';
			var comparison=$think.attr('comparison') || 'lt';
			var start=$think.attr('start') || '0';
			if('$'==start.substr(0,1)){
				start=start.substr(1);
			}
			var end=$think.attr('end') || '0';
			if('$'==end.substr(0,1)){
				end=end.substr(1);
			}
			var step=$think.attr('step') || '1';
			if('$'==step.substr(0,1)){
				step=step.substr(1);	
			}
			return '<% for(var '+name+'='+start+';'+ThinkTemplate.parseCondition(name+comparison+end)+';i=i+'+step+'){  %>'
			});
		tplContent=tplContent.replace(forend,'<% } %>');
		return tplContent;
	},
	//empty标签
	parseEmpty:function(tplContent){
		var	emptystart=/<empty (.*?)>/ig;
		var emptyend=/<\/empty>/ig;
		tplContent=tplContent.replace(emptystart,function(m,v,o){
			var name=$('<think '+v+' />').attr('name');
			return '<% if("undefined"==typeof('+name+') || ThinkTemplate.empty('+name+')){ %>';
			});
		tplContent=tplContent.replace(emptyend,'<% } %>');
		return tplContent;
	},
	//notempty 标签解析
	parseNotempty:function(tplContent){
		var	notemptystart=/<notempty (.*?)>/ig;
		var notemptyend=/<\/notempty>/ig;
		tplContent=tplContent.replace(notemptystart,function(m,v,o){
			var name=$('<think '+v+' />').attr('name');
			return '<% if("undefined"!=typeof('+name+') && !ThinkTemplate.empty('+name+')){ %>';
			});
		tplContent=tplContent.replace(notemptyend,'<% } %>');
		return tplContent;
	},
	//present标签解析
	parsePresent:function(tplContent){
		var	presentstart=/<present (.*?)>/ig;
		var presentend=/<\/present>/ig;
		tplContent=tplContent.replace(presentstart,function(m,v,o){
			var name=$('<think '+v+' />').attr('name');
			return '<% if("undefined"!=typeof('+name+')){ %>';
			});
		tplContent=tplContent.replace(presentend,'<% } %>');
		return tplContent;
	},
	//notpresent 标签解析
	parseNotpresent:function(tplContent){
		var	notpresentstart=/<notpresent (.*?)>/ig;
		var notpresentend=/<\/notpresent>/ig;
		tplContent=tplContent.replace(notpresentstart,function(m,v,o){
			var name=$('<think '+v+' />').attr('name');
			return '<% if("undefined"==typeof('+name+')){ %>';
			});
		tplContent=tplContent.replace(notpresentend,'<% } %>');
		return tplContent;
	},
	parseCompare:function(tplContent){
		var compares={
			"compare":"==",
			"eq":"==",
			"neq":"!=",
			"heq":"===",
			"nheq":"!==",
			"egt":">=",
			"gt":">",
			"elt":"<=",
			"lt":"<"
		};	
		$.each(compares,function(type,sign){
			var start=new RegExp('<'+type+' (.*?)>','ig');
			var end=new RegExp('</'+type+'>','ig');
			tplContent=tplContent.replace(start,function(m,v,o){
				var	$think=$('<think '+v+' />');
				var name=$think.attr('name');
				var value=$think.attr('value');
				if("compare"==type && $think.attr('type')){
					sign=compares[$think.attr('type')];
				}
				if('$'==value.substr(0,1)){
					//value支持变量
					value=value.substr(1);	
				}else{
					value='"'+value+'"';
				}
				return '<% if('+name+sign+value+'){  %>';
				});
			tplContent=tplContent.replace(end,'<% } %>');

		});
		return tplContent;
	},
	//解析if标签
	parseIf:function(tplContent){
		var ifstart=/<if (.*?)>/ig;
		var ifend=/<\/if>/ig;
		tplContent=tplContent.replace(ifstart,function(m,v,o){
			var condition=$('<think '+v+' />').attr('condition');	
			return '<% if('+ThinkTemplate.parseCondition(condition)+'){ %>';
			});
		tplContent=tplContent.replace(ifend,'<% } %>');
		return tplContent;
	},
	//解析elseif
	parseElseif:function(tplContent){
		var elseif=/<elseif (.*?)\/?>/ig;
		tplContent=tplContent.replace(elseif,function(m,v,o){
			var condition=$('<think '+v+'  />').attr('condition');
			return '<% }else if('+ThinkTemplate.parseCondition(condition)+'){ %>';
			});
        tplContent=tplContent.replace('</elseif>','');
		return tplContent;
	},
	//解析else标签
	parseElse:function(tplContent){
		    var el=/<else\s*\/?>/ig	
			tplContent=tplContent.replace(el,'<% }else{ %>');
            tplContent=tplContent.replace('</else>','');
            return tplContent;
			},
	//解析swith标签
	parseSwith:function(tplContent){
		var switchstart=/<switch (.*?)>(\s*)/ig;	
		var switchend=/<\/switch>/ig;
		tplContent=tplContent.replace(switchstart,function(m,v,s,o){
			var name=$('<think '+v+' >').attr('name');	
			return '<% switch('+name+'){ %>';
			});
		tplContent=tplContent.replace(switchend,'<% } %>');
		return tplContent;
	},
	//解析case标签
	parseCase:function(tplContent){
		var casestart=/<case (.*?)>/ig;	
		var caseend=/<\/case>/ig;
		var breakstr='';
		tplContent=tplContent.replace(casestart,function(m,v,o){
			var $think=$('<think '+v+'  />');
			var value=$think.attr('value');
			if('$'==value.substr(0,1)){
				value=value.substr(1);
			}else{
				value='"'+value+'"';
			}
			if('false'!=$think.attr('break')){
				breakstr='<% break; %> ';
			}
			return '<% case '+value+':  %>';
		});
		tplContent=tplContent.replace(caseend,breakstr);
		return tplContent;
	},
	//解析default标签
	parseDefault:function(tplContent){
		var defaulttag=/<default\s*\/?>/ig;	
		tplContent=tplContent.replace(defaulttag,'<% default: %>');
        tplContent=tplContent.replace('</default>','');
		return tplContent;
	},
	//解析in,notin,between,notbetween 标签
	parseRange:function(tplContent){
		var ranges=['in','notin','between','notbetween'];
		$.each(ranges,function(k,tag){
			var start=new RegExp('<'+tag+' (.*?)>','ig');
			var end=new RegExp('</'+tag+'>','ig');
			tplContent=tplContent.replace(start,function(m,v,o){
				var	$think=$('<think '+v+' />');
				var name=$think.attr('name');
				var value=$think.attr('value');
				if('$'==value.substr(0,1)){
					value=value.substr(1);
				}else{
					value='"'+value+'"';
				}
				switch(tag){
					case "in":
						var condition='ThinkTemplate.inArray('+name+','+value+')';	
							break;
							case "notin":
							var condition='!ThinkTemplate.inArray('+name+','+value+')';	
								break;
								case "between":
								var condition=name+'>='+value+'[0] && '+name+'<='+value+'[1]';
								break;
								case "notbetween":
								var condition=name+'<'+value+'[0] || '+name+'>'+value+'[1]';
								break;
								}
								return '<% if('+condition+'){ %>'
								});
							tplContent=tplContent.replace(end,'<% } %>')
							});
						return tplContent;
	},
    //扩展
    extend:function(name,cb){
        name=name.substr(0,1).toUpperCase()+name.substr(1);
        this.tags.push(name);
        this['parse'+name]=cb;
    },
	//判断是否在数组中，支持判断object类型的数据
	inArray:function(name,value){
		if('string'==$.type(value)){
			value=value.split(',');
		}
		var ret=false;
		$.each(value,function(k,v){
			if(v==name){
				ret=true;
				return false;
			}	
		});
		return ret;
	},
	empty:function(data){
		if(!data)
			return true;
		if('array'==$.type(data) && 0==data.length)
			return true;
		if('object'==$.type(data) && 0==Object.keys(data).length)
			return true;
		return false;
	},
	parseCondition:function(condition){
		var conditions={
			"eq":"==",
			"neq":"!=",
			"heq":"===",
			"nheq":"!==",
			"egt":">=",
			"gt":">",
			"elt":"<=",
			"lt":"<",
			"or":"||",
			"and":"&&",
			"\\$":""
		};		
		$.each(conditions,function(k,v){
			var matcher=new RegExp(k,'ig');	
			condition=condition.replace(matcher,v);
		});
		return condition;
	}


};






