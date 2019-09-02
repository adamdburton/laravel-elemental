class Api {
    authentiFake() {
        return new Promise((resolve, reject) => {
            if(Math.random() * 10 > 5) {
                resolve({
                    id: 1,
                    name: 'Admin',
                    email: 'admin@admin.com'
                });
            } else {
                reject('Invalid username or password.');
            }
        });
    }

    sendPasswordResetLink() {
        return new Promise((resolve, reject) => {
            if(Math.random() * 10 > 5) {
                resolve();
            } else {
                reject('Failed to send password reset email.');
            }
        });
    }
}

const api = new Api();

export default api;
