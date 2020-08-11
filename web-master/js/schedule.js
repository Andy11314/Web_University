new Vue({
    el: '#schedule',
    data: {
        course: '',
        speciality: '',
        group: '',
        schedule: [],
        specialities: [],
        groups: [],
        success: false,
        error: false
    },
    methods: {
        fetchSpeciality: function () {
            console.log("sent");
            this.$http.get('http://localhost:81/specialities.php?action=fetch&id=' + this.course).then(
                function (response) {
                    this.specialities = response.body;
                    console.log(response);
                }
            ).catch(
                function (error) {
                    console.log(error);
                }
            )
        },
        fetchGroup: function () {
            console.log("sent");
            this.$http.get('http://localhost:81/groups.php?action=fetch&id=' + this.speciality).then(
                function (response) {
                    this.groups = response.body;
                    console.log(response);
                }
            ).catch(
                function (error) {
                    console.log(error);
                }
            )
        },
        fetchSchedule: function () {
            console.log("sent");
            this.$http.get('http://localhost:81/lessons.php?action=fetch&id=' + this.group).then(
                function (response) {
                    this.schedule = response.body;
                    console.log(response);
                }
            ).catch(
                function (error) {
                    console.log(error);
                }
            )
        },
    },
});