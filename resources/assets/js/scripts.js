jQuery(document).ready(function($) {
    var engine = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.whitespace('id'),
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        remote: {
            url: '/query?user=%QUERY',
            wildcard: '%QUERY'
        }
    });

    engine.initialize();

    $("#users").typeahead({
        hint: true,
        highlight: true,
        minLength: 2
    }, {
        source: engine.ttAdapter(),
        // This will be appended to "tt-dataset-" to form the class name of the suggestion menu.
        name: 'Draft_list',
        // the key from the array we want to display (name,id,email,etc...)
        displayKey: 'username',
        templates: {
            empty: [
                        '<div class="empty-message">unable to find any</div>'
                    ].join('\n'),

                    suggestion: function (data) {
                        return '<div class="user-search-result"><h3>'
                            + data.id + '</h3></div>'
                    }
        },
        engine: Hogan
    });
});
