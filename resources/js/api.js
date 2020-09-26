const axios = require('axios');

axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

function randomly(success, failure) {
    return new Promise((resolve, reject) => {
        let chance = Math.random() >= 0.5;

        if (chance) {
            success(resolve);
        } else {
            failure(reject)
        }
    });
}

class Api {
    authenticate() {
        return randomly(resolve => resolve({
            id: 1,
            name: 'Admin',
            email: 'admin@admin.com'
        }), reject => reject('Invalid username or password.'));
    }

    sendPasswordResetLink() {
        return new Promise((resolve, reject) => {
            if (Math.random() * 10 > 5) {
                resolve();
            } else {
                reject('Failed to send password reset email.');
            }
        });
    }

    async get(type, withProperties = false) {
        let params = {properties: withProperties ? 1 : 0};
        
        return await axios.get('/elemental/api/elements/' + type, {params}).then(response => {
            return response.data.data;
        });
    }
}

const api = new Api();

export default api;
