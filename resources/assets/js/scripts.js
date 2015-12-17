jQuery(document).ready(function($) {
    var lecturersTypeahead = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.obj.whitespace('id'),
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        prefetch: '/data/lecturers-with-approval',
        remote: {
            url: '/data/lecturers-with-approval/%QUERY',
            wildcard: '%QUERY'
        }
    });
    var newUsersTypeahead = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.obj.whitespace('userable_id'),
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        prefetch: '/data/new-users',
        remote: {
            url: '/data/new-users/%QUERY',
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
    var roomsTypeahead = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.obj.whitespace('id'),
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        prefetch: '/data/rooms',
        remote: {
            url: '/data/rooms/%QUERY',
            wildcard: '%QUERY'
        }
    });


    $('#bloodhound-courses .typeahead').typeahead(null, {
        name: 'courses',
        display: 'id',
        limit: 5,
        source: coursesTypeahead,
        templates: {
            empty: [
                '<div class="tt-empty-message">',
                'Can\'t find anything.',
                '</div>'
            ].join('\n'),
            suggestion: Handlebars.compile('<div><strong>{{ id }}</strong> - {{ name }}</div>')
        }
    });

    $('#bloodhound-lecturers .typeahead').typeahead(null, {
        name: 'lecturers',
        display: 'id',
        limit: 5,
        source: lecturersTypeahead,
        templates: {
            empty: [
                '<div class="tt-empty-message">',
                'Can\'t find anything.',
                '</div>'
            ].join('\n'),
            suggestion: Handlebars.compile('<div><strong>{{ id }}</strong> - {{ name }}</div>')
        }
    });

    $('#bloodhound-new-users .typeahead').typeahead(null, {
        name: 'students',
        display: 'userable_id',
        limit: 5,
        source: newUsersTypeahead,
        templates: {
            empty: [
                '<div class="tt-empty-message">',
                'Can\'t find anything.',
                '</div>'
            ].join('\n'),
            suggestion: Handlebars.compile('<div><strong>{{ userable_id }}</strong> - {{ name }}</div>')
        }
    });

    $('#bloodhound-rooms .typeahead').typeahead(null, {
        name: 'rooms',
        display: 'id',
        limit: 5,
        source: roomsTypeahead,
        templates: {
            empty: [
                '<div class="tt-empty-message">',
                'Can\'t find anything.',
                '</div>'
            ].join('\n'),
            suggestion: Handlebars.compile('<div><strong>{{ id }}</strong> - {{ name }}</div>')
        }
    });
});
