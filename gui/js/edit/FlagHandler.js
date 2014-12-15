/* Class: FlagHandler

   An addition to the tagset-specific classes, this class handles all annotation
   changes to status flags ("error" annotation, verified lemma, etc.).

   Behaves similarly to Tagset, but is separate for now since flags are global
   to all texts without needing to be linked to them.
 */
var FlagHandler = new Class({
    flags: {
        'flag_general_error': {
            elem: 'div.editTableError',
            class: 'editTableErrorChecked',
            displayname: "Fehler-Markierung",
            eventString: 'click:relay(div.editTableError)'
        },
        'flag_lemma_verified': {
            elem: 'div.editTableLemma',
            class: 'editTableLemmaChecked',
            displayname: "Lemma-Markierung",
            eventString: 'click:relay(div.editTableLemma)'
        }
    },

    /* Function: initialize
     */
    initialize: function() {
    },

    /* Function: getEventData

       Return event types and event handlers for all flags.

       Returns:
         An array of objects with the following properties:
           type - An event type that should be registered by a DataTable
                  containing flags.
           handler - A function that handles this event for the respective flag.
     */
    getEventData: function() {
        var data = [];
        Object.each(this.flags, function(options, flag) {
            var event = {type: options.eventString};
            event.handler = function(event, target) {
                var value = (target.hasClass(options.class) ? 0 : 1);
                return {cls: flag, value: value};
            };
            data.push(event);
        });
        return data;
    },

    /* Function: getValues

       Gets the flag annotation values from a token data object.

       Parameters:
         data - An object possibly containing annotations ({anno_pos: ...} etc.)
     */
    getValues: function(data) {
        return Object.map(this.flags, function(options, flag) {
            return (data[flag] == 1) ? 1 : 0;
        });
    },

    /* Function: fill

       Fill the appropriate elements in a <tr> with annotation from a token data
       object.

       Parameters:
         tr - Table row to fill
         data - An object possibly containing annotations ({anno_pos: ...} etc.)
     */
    fill: function(tr, data) {
        var ref = this;
        Object.each(this.flags, function(options, flag) {
            var elem = tr.getElement(options.elem);
            if (elem !== null) {
                ref._setFlag(elem, options.class, data[flag]);
            }
        });
    },

    /* Function: update

       Triggered method to call whenever an annotation changes.  Allows the
       FlagHandler to react to a change and/or store the result.

       Parameters:
         tr - Table row where the change happened
         data - An object possibly containing annotations ({anno_pos: ...}),
                in the state *before* the update
         cls - Tagset class of the annotation
         value - New value of the annotation
     */
    update: function(tr, data, cls, value) {
        var ref = this;
        Object.each(this.flags, function(options, flag) {
            var elem;
            if (cls === flag) {
                data[flag] = value;
                elem = tr.getElement(options.elem);
                if (elem !== null)
                    ref._setFlag(elem, options.class, value);
            }
        });
    },

    _setFlag: function(elem, css_class, value) {
        if (value == 1)
            elem.addClass(css_class);
        else
            elem.removeClass(css_class);
    }
});
