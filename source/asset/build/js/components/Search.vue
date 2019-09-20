<template>
    <ul class="vuejs-countdown">
        <li class="how-countdown uk-text-center" v-if="days > 0">
            <p class="digit">{{ days | twoDigits }}</p>
            <p class="text">{{ days > 1 ? 'days' : 'day' }}</p>
        </li>
        <li class="how-countdown uk-text-center">
            <p class="digit">{{ hours | twoDigits }}</p>
            <p class="text">{{ hours > 1 ? 'hours' : 'hour' }}</p>
        </li>
        <li>
            <p class="digit">{{ minutes | twoDigits }}</p>
            <p class="text">min</p>
        </li>
        <li>
            <p class="digit">{{ seconds | twoDigits }}</p>
            <p class="text">Sec</p>
        </li>
    </ul>
</template>

<script>
let interval = null;
export default {
    name: 'vuejsCountDown',
    props: {
        deadline: {
            type: String
        },
        end: {
            type: String
        },
        stop: {
            type: Boolean
        }
    },
    data() {
        return {
            now: Math.trunc((new Date()).getTime() / 1000),
            date: null,
            diff: 0
        }
    },
    created() {
        if (!this.deadline && !this.end) {
            throw new Error("Missing props 'deadline' or 'end'");
        }
        let endTime = this.deadline ? this.deadline : this.end;
        this.date = Math.trunc(Date.parse(endTime.replace(/-/g, "/")) / 1000);
        if (!this.date) {
            throw new Error("Invalid props value, correct the 'deadline' or 'end'");
        }
        interval = setInterval(() => {
            this.now = Math.trunc((new Date()).getTime() / 1000);
        }, 1000);
    },
    computed: {
        seconds() {
            return Math.trunc(this.diff) % 60
        },
        minutes() {
            return Math.trunc(this.diff / 60) % 60
        },
        hours() {
            return Math.trunc(this.diff / 60 / 60) % 24
        },
        days() {
            return Math.trunc(this.diff / 60 / 60 / 24)
        }
    },
    watch: {
        now(value) {
            this.diff = this.date - this.now;
            if(this.diff <= 0 || this.stop){
                this.diff = 0;
                // Remove interval
                clearInterval(interval);
            }
        }
    },
    filters: {
        twoDigits(value) {
            if ( value.toString().length <= 1 ) {
                return '0'+value.toString()
            }
            return value.toString()
        }
    },
    destroyed() {
        clearInterval(interval);
    }
}
</script>
<style>

</style>