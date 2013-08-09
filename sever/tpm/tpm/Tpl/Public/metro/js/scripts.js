(function (d) {
    if (Modernizr.localstorage) {
        if (localStorage.getItem("start.menu_state") === null) {
            localStorage["start.menu_state"] = "sidebar_default";

        }
    } else {}

    //Close The Menu
     var close_the_menu = function () {
        d('html.sidebar_icons #sidebar_menu a.accordion-toggle').parent().removeClass('opened');
        d('html.sidebar_icons #sidebar_menu .collapse.in').collapse('hide');
    };
    //Open The Menu
     var show_the_menu = function () {
        d('html').addClass("active");
    };
    d(function () {
        d("#sidebar_menu a.accordion-toggle").on("click", function () {
            setTimeout(function () {
                d("#sidebar").tinyscrollbar_update("relative")
            }, 300);
            var i = d(this);
            var h = i.closest("li").hasClass("opened");
            i.closest("ul").find("li.opened").removeClass("opened");
            if (!h) {
                i.closest("li").addClass("opened")
            }
        });
    });

    function e() {
        try {
            document.createEvent("TouchEvent");
            return true
        } catch (f) {
            return false
        }
    }
    if (e()) {
        d("#sidebar").css({
            position: "absolute"
        });
        d("html.sidebar_hover.active #sidebar").css("left", "315px");
        d("html.sidebar_icons.active #sidebar").css("left", "315px");
        d("#sidebar .track").remove();
        d("body").swipe({
            swipeLeft: function () {
                d("html").removeClass("active");
                startToggled = false
            },
            swipeRight: function () {
                d("html").addClass("active");
                startToggled = true
            }
        });
    }
    d(window).on("resize", function () {
        d("#loading").remove()
    });
    d("body").css("min-height", d(window).height());

    d(window).load(function () {
        close_the_menu();

        if (d.browser.msie && (parseInt(d.browser.version) <= 9)) {
            d("#loading, .no_ie").remove();
            d("#sidebar").css("position", "absolute");
            d(".menu_states").remove()
        }
    });
    enquire.register("screen and (min-width: 769px)", {
		match: function () {
			if (e()) {
				d(".viewport").height(d(document).height())
			} else {
				d(".viewport").height(d(window).height());
				d("#sidebar").height(d(window).height())
			}
			setTimeout(function () {
				d("#sidebar").tinyscrollbar()
			}, 500);
			d(window).on("resize", function () {
				d("#sidebar, .viewport").height(d(window).height());
				d("#sidebar").tinyscrollbar_update("relative")
			});
			var   o = false;
			var f = function () {
				var l = null,
					n = 15,
					h = d("#sidebar").width(),
					q, m, p = 300,
					k = 500,
					i = true,
					s = true;
				  
			   
				var r = function () {
					if (l < n) {
						d("html").addClass("active");
						d('html.sidebar_icons #sidebar li.accordion-group.active .collapse').collapse('show');
						o = true;
					}
				   
				};
				var j = function () {
					if (l > h) {
						d("html").removeClass("active");
						o = false;
						//Close the accordion menu item
						close_the_menu();
					}
				};
				

				d("body").on("mousemove", function (t) {
					l = t.pageX;
					
					if (!o) {
						if (t.pageX < 15) {
							q = setTimeout(r, p)
						} else {
							clearTimeout(q)
						}
					} else {
						if (t.pageX > 315) {
							m = setTimeout(j, k)
						} else {
							clearTimeout(m)
						}
					}
				});

				//Open the sidebar
				d('html.sidebar_icons #sidebar_menu a.accordion-toggle').on("click", function () {
					// d('html').addClass("active");
					show_the_menu();
					o = true;
				});
			};
			
			var g = ["sidebar_icons", "sidebar_default", "sidebar_hover"];
			d.each(g, function (j, h) {
				d("html").removeClass(h)
			});
			d(".menu_states button").removeClass("active");
			if (Modernizr.localstorage) {
				d("html").addClass(localStorage["start.menu_state"]);
				d('.menu_states button[data-state="' + localStorage["start.menu_state"] + '"]').addClass("active");
			} else {
				d("html").addClass("state_default")
			}
			d(".menu_states button").on("click", this, function () {
				d.each(g, function (j, h) {
					d("html").removeClass(h)
				});
				menu_class = d(this).attr("data-state");
				d("html").addClass(menu_class);
				d('html.'+menu_class+' #sidebar_menu a.accordion-toggle').on("click", function () {
					show_the_menu();

					o = true;
					console.log(o);
				});

				localStorage["start.menu_state"] = menu_class;
				d(".menu_states button").removeClass("active");
				d(this).addClass("active");
			});

			f();
		}
	}).register("screen and (min-width: 600px)", {
		match: function () {
			d(document).ready(function () {
				d("body").fadeIn(500);

				function f() {
					window.location = newLocation
				}
			});
			d(window).load(function () {
				d("#loading").fadeOut()
			})
		}
	}).register("screen and (max-width: 769px)", {
		match: function () {
			if (e()) {
				d("#sidebar").css({
					top: "64px",
					left: "0px"
				})
			}
		}
	}).fire()
})(jQuery);