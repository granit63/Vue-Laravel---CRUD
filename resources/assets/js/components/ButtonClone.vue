<template>
  <div>
    <button class="btn btn-success" @click = "displaylanguage(item)">
      <span style="font-size:25px;">{{ item }}</span>
    </button>
  </div>
</template>

<script>
  export default {
    data: function(){
      return {
        counter: 0
      }
    },
    props: ['item', 'index'],
    methods: {
      displaylanguage: function(lang) {
        this.$emit('showlanguage', lang);
        this.$emit('generate');
      }
    },
  }
</script>
