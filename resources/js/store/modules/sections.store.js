import Vapi from "vuex-rest-api";

const fields = new Vapi({
    baseURL: window.location.origin + '/',
    state: {
        sections: []
    }
})
    .get({
        action: 'getSections',
        property: 'sections',
        path: '/sections'
    })
    .get({
        action: 'getSection',
        property: 'section',
        path: ({id}) => `/sections/${id}`,
    })
    .getStore();

export default fields;
