(function($) {

    var $preloader = {
        onStart: function() {},
        onComplete: function() {},
        onPercent: function() {}
    };

    var CONTAINER;
    var _urlImages = [];

    var startTime;
    var finishTime;

    var hiddenContainer;
    var imageCount = 0;
    var imageCalc = 0;
            
    $.fn.preloader = function(options) {
        CONTAINER = this;
        if (options) $.extend($preloader, options);
        this.find("*").each(function() {
            selectImages(this);
        });
        createLoader();
        return this;
    }

    var selectImages = function(element) {
        var url = "";
        if ($(element).css("background-image") != "none") var url = $(element).css("background-image").replace("url(", "").replace(")", "");
        else if (typeof($(element).attr("src")) != "undefined" && element.nodeName.toLowerCase() == "img") var url = $(element).attr("src");
        url = url.replace(/\"/g, '');
        if (url != "") {
            _urlImages.push(url.trim());
        }
    }

    var createLoader = function() {
        var date = new Date();
        startTime = date.getTime();
        if (_urlImages != "") {
            createElementsPreLoader();
            createContainer();
            $preloader.onStart();
        } else {
            $preloader.onComplete();
        }
    }

    var createElementsPreLoader = function() {
        CONTAINER.css({
            overflow: "hidden"
        });
    }

    var createContainer = function() {
        hiddenContainer = $("<div></div>").appendTo(CONTAINER)
            .css({
                display: "none",
                overflow: "hidden",
                width: 0,
                height: 0
            });
        
        for (var i = 0; i < _urlImages.length; i++) {
            var image = new Image();
            $(image).one({
                load: function() {
                    timePercent();
                },
                error: function() {
                    timePercent();
                }
            })
            .attr("src", _urlImages[i])
            .appendTo(hiddenContainer);
        }
    }

    var timePercent = function() {
        try {
            imageCount++;
            var percent = (imageCount / _urlImages.length) * 100;
            $('#percent').html(parseInt(percent));
            $preloader.onPercent( percent );
            if (imageCount == _urlImages.length) destroyLoader();
        } catch(err) { }
    }

    var destroyLoader = function() {
        hiddenContainer.remove();
        CONTAINER.css({
            overflow: "auto"
        });
        $preloader.onComplete();
    }

})(jQuery);