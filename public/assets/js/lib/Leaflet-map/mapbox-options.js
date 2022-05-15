$('body').click(function () {
    map.setLayoutProperty('country-label', 'text-field', [
        'get',
        `name_ar`
    ]);
    map.setLayoutProperty('state-label', 'text-field', [
        'get',
        `name_ar`
    ]);
    map.setLayoutProperty('settlement-label', 'text-field', [
        'get',
        `name_ar`
    ]);
    map.setLayoutProperty('settlement-subdivision-label', 'text-field', [
        'get',
        `name_ar`
    ]);
    map.setLayoutProperty('airport-label', 'text-field', [
        'get',
        `name_ar`
    ]);
    map.setLayoutProperty('road-label', 'text-field', [
        'get',
        `name_ar`
    ]);
})
