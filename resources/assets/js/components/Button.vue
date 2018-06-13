<template>
  <div id="htmltopdf">
    <div id="content">
      <h1 class="text-primary">Language displayed : <span class="text-danger" id="small-text">{{ languageclicked }}</span></h1>
      <div class="btn-group">
        <button-component
          v-for="(item, index) in ['Java', 'PHP', 'C++', 'C', 'Javascript', 'C#', 'Python', 'HTML']"
          :item="item"
          :key="item"
          @showlanguage="languagedisp"
          @generate="generatePDF"
          class="btn"
        ></button-component>
      </div>
    </div>
    <div id="ignore"></div>
  </div>
</template>

<script>

  import ButtonComponent from './ButtonClone.vue';
  import jsPDF from 'jspdf';
  // import hmtlToPdf from 'html-to-pdf';

  export default {
    data() {
      return {
        languageclicked: "",
        languages : ["Java", "PHP", "C++", "C", "Javascript", "C#", "Python", "HTML"]
      }
    },

    methods: {
      languagedisp(a) {
        this.languageclicked = a;
      },
      generatePDF() {
        let doc = new jsPDF();
        let pdfName = "test.pdf";
        let elementHandler = {
          '#ignore': function (element, render) {
            return true;
          }
        };

        // let parent = $('.text-primary').clone();
        let parent = $('#content')[0];
        // let parent1 = document.getElementById('small-text');
        let parent1 = $('#small-text');
        // console.log(parent1);
        let finalhtml = "";
        finalhtml = convertExternalInternalStylesToInline(parent1);
        console.log(finalhtml);

        function convertExternalInternalStylesToInline(parent) {
          // var parent = $(parent).clone(); // clone it before modify, is this deep clone?
          // console.log(parent);
          // $parent.find(":contains()").each(function(idx,el){ // fetch all children
             // var elContent = $(parent)[0]; // convert to jquery object
             var ddd = parent[0];
             let tmp = dumpComputedStyles(ddd, null);
             for(let key in tmp){
               parent.css( key, tmp[key]);
             }
          // });
          // return as string, maybe:
          return parent[0];
        }

        function dumpComputedStyles(elem, prop) {

          var cs =  window.getComputedStyle(elem, null);
          // console.log(cs);

          if(prop) {
            console.log(prop+" : "+cs.getPropertyValue(prop));
            return;
          }

          var len = cs.length;
          var final = [];
          for(var i=0;i<len;i++){
            var style = cs[i];
            final[style] = cs.getPropertyValue(style);
            // console.log(style+" : "+cs.getPropertyValue(style));
          }
          return final;
        };
        // console.log(classes);

        // window.axios.get(`/api/htmltopdf`, {}).then((ddd) => {
        //   console.log('convert to pdf file successful.');
        // });
        //
        console.log(parent);
        doc.fromHTML(
          parent,
          15,
          15,
          {
            'width': '180',
            'elementHandlers': elementHandler
          }
        );
        doc.save(pdfName);
      }
    },

    components: {
      ButtonComponent
    },
  }
</script>
