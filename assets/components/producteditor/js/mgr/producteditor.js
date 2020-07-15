var productEditor = function (config) {
    config = config || {};
    productEditor.superclass.constructor.call(this, config);
};
Ext.extend(productEditor, Ext.Component, {
    page: {}, window: {}, grid: {}, tree: {}, panel: {}, combo: {}, config: {}, view: {}, utils: {}
});
Ext.reg('producteditor', productEditor);

productEditor = new productEditor();