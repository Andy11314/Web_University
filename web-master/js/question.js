new Vue({
    el: '#question',
    data: {
        form: {
            name: '',
            email: '',
            question: ''
        },
        success: false,
        error: false
    },
    methods: {
        addQuestion: function () {
            console.log("sent");
            this.$http.post('http://localhost:81/questions.php?action=create',  JSON.stringify({
                name: this.form.name,
                email: this.form.email,
                question: this.form.question,
            })).then(
                function (response) {
                    if(response.error){
                        this.error = true;
                    } else {
                        this.success = true;
                    }
                }
            ).catch(
                function (error) {
                    this.error = true;
                }
            )
        },
    },
});