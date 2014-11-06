$.fn.extend({
    trackChanges: function() {
        $("[type=submit]").attr("disabled", "disabled");
        $(":input",this).keyup(function() {
            $(this.form).data("changed", true);
            $("[type=submit]").removeAttr("disabled", "disabled");
        });
        $(":input",this).change(function() {
            $(this.form).data("changed", true);
            $("[type=submit]").removeAttr("disabled", "disabled");
        });
    },
    HasChanged: function() {
        if(this.data("changed"))
            return this.data("changed");
        return false;
    }
});