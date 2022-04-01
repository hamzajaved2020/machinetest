<!DOCTYPE html>
<html>

<head>
    <title>Assignment</title>
    <style>
        .section {
            display: flex;
            flex-direction: column;
            align-items: center;
            background: #44a6f7;
            padding: 36px;
            max-width: 350px;
            margin: auto;
            min-height: 250px;
            justify-content: center;
        }

        .d-flex {
            display: flex;
        }

        .mr-auto {
            margin-right: auto;
        }

        button {
            background: gray;
            color: #fff;
            border-radius: 5px;
            font-size: 17px;
            font-family: 'Source Sans Pro', sans-serif;
            padding: 7px 18px;
            border: none;
            cursor: pointer;
            white-space: nowrap;
        }

        input[type="text"] {
            display: block;
            width: 100%;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            line-height: 1.5;
            border: none;
        }

        .btn-group {
            display: flex;
        }

        .btn-group button {
            margin: 0px 4px;
        }
    </style>
</head>
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>

<body>
<!-- form 1 -->
<!-- <div class="section">
    <input type="text" placeholder="Please enter your name" />
    <button>Next</button>
</div> -->

<!-- form 2 -->
<div id="app" class="section">
    <div v-if="showQuestion">
        <p><strong>Question {- questionNo -}</strong></p>
        <p><strong> {- this.result.title-} </strong></p>
        <br>
        <div v-for="option in result.options">
            <div class="d-flex mr-auto" >
                <input type="radio" v-model="selected_option" :id="option.id" name="fav_language" :value="option.id" /><label :for="option.id" v-text="option.name"></label>
            </div>
            <br>
        </div>

        <br>
        <div class="btn-group">
            <button @click="skip">Skip</button>
            <button  :disabled="!selected_option"  @click="answer">Next</button>
        </div>
    </div>
    <div id="result" v-if="!showQuestion">
        <p><strong>Result</strong></p>
        <p><strong>Correct</strong> : {-correct-}</p>
        <p><strong>Wrong</strong> : {-wrong-}</p>
        <p><strong>Skip</strong> : {-skip_ans-}</p>
    </div>
</div>
</body>


<script>
    var myObject = new Vue({
        el: '#app',
        data: {
            questionNo: {{session('question_no') ? session('question_no') : 0 }},
            selected_option: 0,
            correct: 0,
            wrong: 0,
            skip_ans: 0,
            showQuestion: 0,
            disableNext:1,
            result: {
                options:[
                ],
            }

        },
        delimiters: ['{-', '-}'],
        created(){
            this.next()
        },
        methods:{
            async answer(){
                try {
                    const url = `/answer?question_id=${this.questionNo}&option_id=${this.selected_option}&is_skip=0`;
                    const data  = await fetch(url)

                    this.next();

                } catch (err) {
                    console.log(err)
                }
            },
            async skip(){
                try {
                    const url = `/answer?question_id=${this.questionNo}&option_id=0&is_skip=1`;
                    const data  = await fetch(url)

                    this.next();

                } catch (err) {
                    console.log(err)
                }
            },
            async  next() {
                try {
                    const url = `/getData?question_no=${this.questionNo+1}`;
                    const data  = await fetch(url)
                    const result = await data.json()
                    if(result.type == "result"){
                        this.correct = result.data.correct
                        this.wrong = result.data.wrong
                        this.skip_ans = result.data.skip
                        this.showQuestion = 0
                    }else{
                        this.showQuestion = 1
                        this.result = result.data
                        this.selected_option = 0
                        this.questionNo = this.result.id

                    }

                } catch (err) {
                    console.log(err)
                }
            },
        }

    })
</script>



</html>
