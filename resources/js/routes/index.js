import util from './util';
import auth from './auth';

import dashboard from './dashboard';
import content from './content';
import admin from './admin';

export default [
    ...dashboard,
    ...content,
    ...admin,
    ...auth,
    ...util,
]