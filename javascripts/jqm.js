//return ThinkTemplate.parse(tplContent,vars);
var GM = {
    utils: {},
	cache:{}
};
/**/
vars=GM.cache['1']=menu.data
tplContent=$('#MainPage').html();
tplContent=ThinkTemplate.parse(tplContent,{'list':vars});
$('#MainPage').html(tplContent);
vars=GM.cache['1']
tplContent=$('#mypanel').html();
tplContent=ThinkTemplate.parse(tplContent,{'list':vars});
$('#mypanel').html(tplContent);
GM.utils = {
    loadingShow: function() {
        $.mobile.loading("show", {
            text: "加载中...",
            textVisible: !0,
            theme: "a",
            html: ""
        })
    },
    loadingHide: function() {
        $.mobile.loading("hide")
    }
};
function ShowDocPage(docid,doctitle){
	$.mobile.changePage($("#DocPage"), {
        transition: "fade"
    });
    GM.utils.loadingShow();
	html=''
	$("#doctitle").text(doctitle)
	$("#doccontent").html(html)
	GM.utils.loadingHide()
}