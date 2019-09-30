function randomly(doThis, orThat) {
    return new Promise((resolve, reject) => {
        if (Math.random() * 10 > 5) {
            doThis(resolve, reject);
        } else {
            orThat(resolve, reject);
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

    get(elementType, params) {
        return randomly(resolve => resolve([
            {
                name: 'Commodo Vulputate',
                description: 'Magna Venenatis Consectetur Porta Cras',
            },
            {
                name: 'Purus Nibh Risus',
                description: 'Elit Euismod Tellus Venenatis Mattis',
            },
            {
                name: 'Mattis Risus',
                description: 'Justo Quam Risus Vestibulum',
            }
        ]), resolve => resolve([
            {
                name: 'Commodo Vulputate 2',
                description: 'Magna Venenatis Consectetur Porta Cras',
            },
            {
                name: 'Purus Nibh Risus 2',
                description: 'Elit Euismod Tellus Venenatis Mattis',
            },
            {
                name: 'Mattis Risus 2',
                description: 'Justo Quam Risus Vestibulum',
            }
        ]));
    }

    searchElements(params) {
        return new Promise((resolve, reject) => {
            resolve([
                { "value": "vue", "link": "https://github.com/vuejs/vue" },
                { "value": "element", "link": "https://github.com/ElemeFE/element" },
                { "value": "cooking", "link": "https://github.com/ElemeFE/cooking" },
                { "value": "mint-ui", "link": "https://github.com/ElemeFE/mint-ui" },
                { "value": "vuex", "link": "https://github.com/vuejs/vuex" },
                { "value": "vue-router", "link": "https://github.com/vuejs/vue-router" },
                { "value": "babel", "link": "https://github.com/babel/babel" }
            ].filter(link => params.search ? link.value.indexOf(params.search) > -1 : false));
        });
    }
}

const api = new Api();

export default api;
