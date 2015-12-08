jQuery(document).ready(function($) {
    var lecturersTypeahead = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.obj.whitespace('id'),
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        prefetch: '/data/lecturers',
        remote: {
            url: '/data/lecturers/%QUERY',
            wildcard: '%QUERY'
        }
    });
    var coursesTypeahead = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.obj.whitespace('id'),
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        prefetch: '/data/courses',
        remote: {
            url: '/data/courses/%QUERY',
            wildcard: '%QUERY'
        }
    });


    $('#bloodhound-courses .typeahead').typeahead(null, {
        name: 'courses',
        display: 'id',
        source: coursesTypeahead,
        templates: {
            empty: [
                '<div class="empty-message">',
                'Can\'t find anything.',
                '</div>'
            ].join('\n'),
            suggestion: Handlebars.compile('<div><strong>{{ id }}</strong> - {{ name }}</div>')
        }
    });

    $('#bloodhound-lecturers .typeahead').typeahead(null, {
        name: 'lecturers',
        display: 'id',
        source: lecturersTypeahead,
        templates: {
            empty: [
                '<div class="empty-message">',
                'Can\'t find anything.',
                '</div>'
            ].join('\n')//,
            //suggestion: Handlebars.compile('<div><strong>{{ id }}</strong> - {{ name }}</div>')
        }
    });
});
