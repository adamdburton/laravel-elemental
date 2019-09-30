import api from './api'

class Elemental {

    async getModules() {
        return api.get('elemental-modules');
    }

}

const elemental = new Elemental();

export default elemental;