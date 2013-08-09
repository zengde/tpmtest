var GM = {
    utils: {},
};
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
	$.ajax({
		type: "GET",
		url: "./Index/read/id/"+docid,
		dataType: "json",
		cache: !0
	}).done(function(a) {
		html=''
		$.each(a.data,function(){
			html+=this.content
		})
		$("#doctitle").text(doctitle)
		$("#doccontent").html(html)
        GM.utils.loadingHide()
	})
}