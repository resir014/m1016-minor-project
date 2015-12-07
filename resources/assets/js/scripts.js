jQuery(document).ready(function($) {
    var engine = new Bloodhound({
        remote: '/schedule-drafts/query?id=%QUERY%',
        // '...' = displayKey: '...'
        datumTokenizer: Bloodhound.tokenizers.whitespace('id'),
        queryTokenizer: Bloodhound.tokenizers.whitespace
    });

    engine.initialize();

    $("#users").typeahead({
        hint: true,
        highlight: true,
        minLength: 2
    }, {
        source: engine.ttAdapter(),
        // This will be appended to "tt-dataset-" to form the class name of the suggestion menu.
        name: 'ScheduleDraft_list',
        // the key from the array we want to display (name,id,email,etc...)
        displayKey: 'id',
        templates: {
            empty: [
                '<div class="empty-message">unable to find any</div>'
            ]
        }
    });
});
