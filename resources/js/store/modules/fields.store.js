import Vapi from "vuex-rest-api";

const fields = new Vapi({
    baseURL: window.location.origin + '/',
    state: {
        fields: [],
        groups: []
    }
})
    .get({
        action: 'getFields',
        property: 'fields',
        path: '/fields'
    })
    .get({
        action: 'getField',
        property: 'field',
        path: ({id}) => `/fields/${id}`,
    })
    .get({
        action: 'getGroups',
        property: 'groups',
        path: '/fields/groups'
    })
    .get({
        action: 'getGroup',
        property: 'group',
        path: ({id}) => `/fields/groups/${id}`,
    })
    .getStore();

export default fields;
