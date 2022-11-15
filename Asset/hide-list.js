(function($){
    if ($){
        $(document).ready(function(){
            var $listView = $(".views-switcher-component .views li .view-listing");
            if ($listView.length == 1){
                $listView.parent().hide();
            }
        });
    }
})(typeof jQuery == "undefined" ? null: jQuery);
