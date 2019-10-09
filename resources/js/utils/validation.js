export default {
    valuesMatch(rule, value, callback) {
        if (value !== rule.match()) {
            callback(new Error(rule.message));
        } else {
            callback();
        }
    }
}