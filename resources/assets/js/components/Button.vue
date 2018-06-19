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
  import html2canvas from 'html2canvas';
  import html2pdf from 'mjfhtml2pdf';
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
        let source = $('#content')[0];
        
        html2pdf(source, {
          margin:       1,
          filename:     'myfile.pdf',
          image:        { type: 'jpeg', quality: 0.98 },
          html2canvas:  { dpi: 192, letterRendering: true },
          jsPDF:        { unit: 'in', format: 'letter', orientation: 'portrait' }
        });
        // var img = {
        //     image_pro: null
        // };
        // html2canvas(source).then(function(canvas) { cp(canvas); });
        // var cp = function(canvas) {
        //     // var image_cv = Canvas2Image.convertToPNG(canvas); //to generate an image from canvas
        //     // img.image_pro = image_cv.getAttribute('src');
        //     var myImage = canvas.toDataURL();
        //     downloadURI(myImage, "cartao-virtual.png");
        // };
        //
        // function downloadURI(uri, name) {
        //     var link = document.createElement("a");
        //
        //     link.download = name;
        //     link.href = uri;
        //     document.body.appendChild(link);
        //     link.click();
        //     clearDynamicLink(link);
        // }
        // html2canvas(source, {
        //     onrendered: function(canvas) {
        //         theCanvas = canvas;
        //         document.body.appendChild(canvas);
        //
        //         // Convert and download as image
        //         Canvas2Image.saveAsPNG(canvas);
        //     }
        // });


      }
    },

    components: {
      ButtonComponent
    },
  }
</script>
