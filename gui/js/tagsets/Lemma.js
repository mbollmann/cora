/* Class: LemmaTagset

   Class representing a Lemma tagset.
 */
var LemmaTagset = new Class({
    Extends: Tagset,
    Implements: LemmaAutocomplete,
    classname: "Lemmatisierung",
    eventString: 'input:relay(input.et-input-lemma)',

    /* Constructor: Tagset

       Instantiate a new LemmaTagset.

       Parameters:
         data - A data object containing tagset information.
     */
    initialize: function(data) {
        this.parent(data);
    },

    /* Function: buildTemplate

       Update an editor line template for this tagset.

       Parameters:
         td - Table cell element to update
     */
    buildTemplate: function(td) {
    },

    /* Function: fill

       Fill the approriate elements in a <tr> with annotation from a token data
       object.

       Parameters:
         tr - Table row to fill
         data - An object possibly containing annotations ({anno_pos: ...} etc.)
     */
    fill: function(tr, data) {
        var ref = this;
        var elem = tr.getElement('.editTable_lemma input');
        if(elem !== null) {
            elem.set('value', data.anno_lemma);
            this.makeNewAutocomplete(elem, 'fetchLemmaSugg', data);
        }
    },

    /* Function: update

       Triggered method to call whenever an annotation changes.

       Parameters:
         tr - Table row where the change happened
         data - An object possibly containing annotations ({anno_pos: ...}),
                in the state *before* the update
         cls - Tagset class of the annotation
         value - New value of the annotation
     */
    update: function(tr, data, cls, value) {
        if (cls === "lemma") {
            if (data.anno_lemma !== value) {
                data.anno_lemma = value;
                data.flag_lemma_verified = 0;
                tr.getElement('div.editTableLemma').removeClass('editTableLemmaChecked');
            }
        }
        else if (cls === "lemma_ac") {
            data.anno_lemma = value.lemma;
            data.flag_lemma_verified = value.lemma_verified;
            if(value.lemma_verified === 1) {
                tr.getElement('div.editTableLemma').addClass('editTableLemmaChecked');
            } else {
                tr.getElement('div.editTableLemma').removeClass('editTableLemmaChecked');
            }
        }
    }
});
