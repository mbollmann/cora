/* Class: LemmaAutocomplete

   Provides auto-complete functionality to an <input> field.
 */
var LemmaAutocomplete = new Class({
    _acSplitRe: new RegExp("^(.*) \\[(.*)\\]$"),

    /* Function: makeNewAutocomplete

       Enables auto-completion for a given input field.

       Parameters:
         elem - The <input> element to receive auto-completion
         query - The action type for the query string (?do=...)
         data - An object containing annotations
     */
    makeNewAutocomplete: function(elem, query, data) {
        var meio = elem.retrieve('meio');
        if (meio != null)
            meio.destroy();
        meio = new Meio.Autocomplete(elem, 'request.php?do='+query,
                       {
                           delay: 100,
                           urlOptions: {
                               extraParams: [
                                   {name: 'linenum', value: data.id}
                               ]
                           },
                           filter: {
                               filter: this._acFilter.bind(this),
                               formatMatch: this._acFormatMatch.bind(this),
                               formatItem: this._acFormatItem.bind(this)
                           }
                       });
        meio.addEvent('select', this._acOnSelect.bind(this));
        elem.store('meio', meio);
    },

    _acFilter: function(text, data) {
        if (data.t == "s" || data.t == "c")
            return true;
        return text ?
            data.v.standardize().test(
                new RegExp("^" + text.standardize().escapeRegExp(), 'i')
            )
            : true;
    },

    _acFormatMatch: function(text, data, i) {
        return data.v;
    },

    _acFormatItem: function(text, data) {
        var sdata = this._acSplitExternalId(data.v);
        var item = (text && data.t == "q") ?
                ('<strong>' + sdata[0].substr(0, text.length) + '</strong>'
                 + sdata[0].substr(text.length))
                : sdata[0];
        if (sdata[1] != "")
            item = item + " <span class='ma-greyed'>[" + sdata[1] + "]</span>";
        if (data.t == "c")
            item = "<span class='ma-confirmed'>" + item + "</span>";
        if (data.t == "s" || data.t == "c")
            item = "<div class='ma-sugg'>" + item + "</div>";
        return item;
    },

    _acSplitExternalId: function(value) {
        var match = this._acSplitRe.exec(value);
        return (match == null) ? [value, ""] : [match[1], match[2]];
    },

    _acOnSelect: function(e, v, text, index) {
        // This is one giant HACK at the moment :(
        // ... tagset currently have no way of triggering updates themselves,
        // as the event handlers are registered by the DataTable, and tagsets
        // have to wait to get called ...
        var flag = (v.t == "c") ? 1 : 0,
            flagDiv = e.field.node.getParent('tr').getElement('div.editTableLemma');
        e.field.node.getParent('table')
            .fireEvent('input', {target: e.field.node});
        if (flag == 0)
            flagDiv.addClass('editTableLemmaChecked');
        else
            flagDiv.removeClass('editTableLemmaChecked');
        e.field.node.getParent('table').fireEvent('click', {target: flagDiv});
        //this.callback(e.field.node, 'lemma', text);
        //this.callback(e.field.node, 'flag_lemma_verified', flag);
    }
});