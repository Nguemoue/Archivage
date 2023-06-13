const path = require('path');
mix.alias({
	ziggy:path.resolve('vendor/tightenco/ziggy/dist')
})
module.exports = {
    resolve: {
        alias: {
            '@': path.resolve('resources/js'),
        },
    },
};
