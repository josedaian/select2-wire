<script>
    // validate if jQuery and Select2 is available
    if (typeof jQuery === 'undefined') {
        throw new Error('Select2Wire require jquery.js');
    }

    if (typeof jQuery.fn.select2 === 'undefined') {
        throw new Error('Select2Wire require select2.js');
    }

    const Select2Wire = window.Select2Wire || {};

    Select2Wire.Init = {
        elements() {
            const select2Elements = $('[data-select2wire="select2"]:not("[data-select2-id]")');
            
            select2Elements.each(function() {
                const element = $(this);
                const componentId = element.closest('[wire\\:id]').attr('wire:id');

                Select2Wire.Load.element(element, componentId);
            });
        },
        
        elementConfig(element) {
            return {
                tags: element.is("[data-tags]"),
                language: element.data("language") || "en",
                dir: element.data("dir") || "ltr",
                dropdownParent: element.is("[data-parent]") ? $(element.data("parent")) : null,
                minimumResultsForSearch: element.is("[data-search-off]") ? -1 : 0,
                allowClear: element.is("[data-clear]")
            };
        }
    };

    Select2Wire.Load = {
        element(element, componentId) {
            const config = Select2Wire.Init.elementConfig(element);

            const wireModelAttr = element[0].attributes.getNamedItem("wire:model") ||
                element[0].attributes.getNamedItem("wire:model.defer");
            
            if (!element.attr("class")) {
                element.attr("class", "form-select");
            }

            const select2Element = element.select2(config);

            if (wireModelAttr && componentId) {
                const propName = wireModelAttr.value;
                const isDefer = wireModelAttr.name.includes("defer");

                select2Element.on("change", function() {
                    Livewire.find(componentId).set(propName, select2Element.val(), isDefer);
                });
            }
        }
    };

    $(document).ready(() => {
        Select2Wire.Init.elements();
    });

    window.addEventListener("select2wire.init", Select2Wire.Init.elements);
    window.addEventListener("select2wire.load", event => {
        Select2Wire.Load.element($(event.detail.target), event.detail.component);
    });
</script>
