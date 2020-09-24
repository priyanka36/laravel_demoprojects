var app = new Vue({
    el: '#app',
    data: {

        toBeDeletedTeamId:'',

    },
    methods: {

        setTeamIdForDelete: function (toBeDeletedTeamId) {
            this.toBeDeletedTeamId = toBeDeletedTeamId;

        },







    },

    computed: {
        deleteUrl: function() {
            return basePath + 'backend/team/delete/' + this.toBeDeletedTeamId;
        }
    }


});
