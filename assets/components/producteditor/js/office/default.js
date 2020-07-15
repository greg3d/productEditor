Ext.onReady(function () {
    productEditor.config.connector_url = OfficeConfig.actionUrl;

    var grid = new productEditor.panel.Home();
    grid.render('office-producteditor-wrapper');

    var preloader = document.getElementById('office-preloader');
    if (preloader) {
        preloader.parentNode.removeChild(preloader);
    }
});