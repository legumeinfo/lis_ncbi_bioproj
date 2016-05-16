<!-- Title and guide text  -->
<div>
  <h1>NCBI BioProjects (legumes)</h1>
  <span style="font-size: 85%">&nbsp;(List of Transcriptome/ Gene Expression related 'BioProjects' at NCBI for LIS legume species)</span>
</div>
<script  type="text/javascript"  src="/sites/all/modules/lis_ncbi_bioproj/lis_ncbi_bioproj.js"></script>
<script>
  var genus = "<?php echo $genus ?>";
  var method = "<?php echo $method ?>";
</script>
<!-- -----------------------------------------------------------------------  -->

<div>
  <fieldset>
    <form id="genus" action="">
      <b>&nbsp;Genus:&nbsp;&nbsp;</b>  
      <select  id="genus" onchange="FillDomElementWithBioprojHtml (this.options[this.selectedIndex].value, method, 'bioprojectList'); console.log('selected-option-value: ' + this.options[this.selectedIndex].value);">
          <option value="Fabaceae">  All Legumes (Fabaceae) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
          <option value="Apios">  Apios  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
          <option value="Arachis">  Arachis  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
          <option value="Cajanus">  Cajanus  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
          <option value="Chamaecrista">  Chamaecrista  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <option value="Cicer">  Cicer  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
          <option value="Glycine">  Glycine  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
          <br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
          <option value="Lens culinaris">  Lens (culinaris) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
          <option value="Lotus japonicus">  Lotus (japonicus) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
          <option value="Lupinus">  Lupinus  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
          <option value="Medicago">  Medicago  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
          <option value="Phaseolus" selected="selected">  Phaseolus  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
          <option value="Pisum">  Pisum  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
          <br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  </option>          
          <option value="Trifolium">  Trifolium  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
          <option value="Vicia">  Vicia  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
          <option value="Vigna">  Vigna  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
      </select>
    </form>
    
    <form id="method"  action="">
            <b>&nbsp;Method:</b>&nbsp;&nbsp;
            <input type="radio" name="method" value="All"  checked="checked"  onclick="FillDomElementWithBioprojHtml (genus, this.value, 'bioprojectList');">&nbsp;&nbsp;All &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="radio" name="method" value="Array"    onclick="FillDomElementWithBioprojHtml (genus, this.value, 'bioprojectList');">&nbsp;&nbsp;Array&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="radio" name="method" value="Sequencing"  onclick="FillDomElementWithBioprojHtml (genus, this.value, 'bioprojectList');">&nbsp;&nbsp;Sequencing
    </form>  
  </fieldset>
</div>
    
<!--
    <form id="period"  action="">
            <!--<legend>Period:</legend><br> - ->
            <b>Period (Reconsider if period is relevant or even possible; not months but years):</b>&nbsp;&nbsp;
            <input type="radio" name="period" value="1"  onclick="FillDomElementWithBioprojHtml (genus, this.value, 'bioprojectList');">&nbsp;&nbsp;Last month &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="radio" name="period" value="3"  checked="checked"  onclick="FillDomElementWithBioprojHtml (genus, this.value, 'bioprojectList');">&nbsp;&nbsp;Last 3 months&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="radio" name="period" value="6"  onclick="FillDomElementWithBioprojHtml (genus, this.value, 'bioprojectList');">&nbsp;&nbsp;Last 6 months
    </form>  
-->





<script>
  //For initial page loading before user interaction
FillDomElementWithBioprojHtml (genus, method, 'bioprojectList');
</script> 
<!--  ---------------------------------------------------------------------   -->
<hr/>
<!--<iframe id="frameviewer" frameborder="0" width="1200" height="2500" scrolling="yes"  src="http://www.ncbi.nlm.nih.gov/pubmed?linkname=pubmed_pubmed_citedin&from_uid=15608283"  name="frameviewer">-->
</div>

<div id="bioprojectList">
  
  <span style='font-size:1.5em;color:#999999'>DIV for BioProj data  ...   ...   ...</span>
  
</div>


<!-- SCRATCH PAD  -->

