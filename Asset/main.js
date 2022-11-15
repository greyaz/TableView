(function(KB){
    if (KB){
        KB.on('dom.ready', function () {
            function goToLink (selector) {
                if (! KB.modal.isOpen()) {
                    var element = KB.find(selector);

                    if (element !== null) {
                        window.location = element.attr('href');
                    }
                }
            }

            KB.onKey('v+t', function () {
                goToLink('a.table-view');
            });
        });
    }
})(typeof KB == "undefined" ? null: KB);

