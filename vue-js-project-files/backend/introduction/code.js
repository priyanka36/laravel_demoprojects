var app = new Vue({
    el: '#app',
    data: {

        toBeDeletedIntroductionId:'',

    },
    methods: {

        setIntroductionIdForDelete: function (toBeDeletedIntroductionId) {
            this.toBeDeletedIntroductionId = toBeDeletedIntroductionId;

        },







    },

    computed: {
        deleteUrl: function() {
            return basePath + 'backend/introduction/delete/' + this.toBeDeletedIntroductionId;
        }
    }


});
