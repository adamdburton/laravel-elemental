function randomly(doThis, orThat) {
    return new Promise((resolve, reject) => {
        if (Math.random() * 10 > 5) {
            doThis(resolve);
        } else {
            orThat(reject);
        }
    });
}

class Api {
    authentiFake() {
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
}

const api = new Api();

export default api;
