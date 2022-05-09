module.exports = {
    env: {
        browser: true,
        es2021: true,
        node: true,
    },
    extends: [
        'plugin:vue/vue3-recommended',
        'airbnb-base',
    ],
    globals: {
        defineEmits: 'readonly',
        defineProps: 'readonly',
        route: 'readonly',
    },
    parser: 'vue-eslint-parser',
    parserOptions: {
        ecmaVersion: 'latest',
        sourceType: 'module',
    },
    plugins: [
        'vue',
    ],
    rules: {
        camelcase: ['off'],
        indent: ['error', 4],
        'brace-style': ['error', 'stroustrup', { allowSingleLine: false }],
        'object-curly-newline': ['error', { multiline: true }],
        'prefer-destructuring': ['error', { object: true, array: false }],
        'vue/no-multiple-template-root': 0,
        'vue/html-indent': ['error', 4, {
            attribute: 1,
            baseIndent: 1,
            closeBracket: 0,
            alignAttributesVertically: false,
            ignores: [],
        }],
    },
    settings: { 'import/resolver': { node: { extensions: ['.js', '.jsx', '.ts', '.tsx'] } } },
};
