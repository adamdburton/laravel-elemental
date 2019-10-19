const requireModule = require.context('.', false, /\.js$/);
const modules = {};

requireModule.keys().forEach(filename => {
    // Don't register this file as a Vuex module
    if (filename === './index.js') return;

    // create the module name from fileName
    // remove the store.js extension and capitalize
    const moduleName = filename
        .replace(/(\.\/|\.store\.js)/g, '')
        .replace(/^\w/, c => c.toUpperCase());

    modules[moduleName] = requireModule(filename).default || requireModule(filename);
});

export default modules;