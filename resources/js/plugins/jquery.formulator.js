// formulator

(function($) {
    "use strict";

    $.fn.formulator = function(options) {
        let settings = $.extend({}, options);

        let constructor = function($form) {
            let $fields = $form.find("input, select, textarea");
            let $submit = $form.find('button[type="submit"]');

            let formDisabled = function() {
                // if ($form.hasClass("form--addproduct")) return false;
                if ($form.hasClass("no-clean")) return false;

                $submit.prop("disabled", true);

                $fields.change(function() {
                    $submit.prop("disabled", false);
                });

                $fields.bind("keypress", function() {
                    $submit.prop("disabled", false);
                });
            };

            let formValidate = function() {
                if (
                    $form.hasClass("form-validate") &&
                    !$form.hasClass("form-validate-load")
                ) {
                    // Validate Rut

                    $(".input-rut, .rut, [name='rut']")
                        .Rut({
                            format_on: "keyup"
                        })
                        .on("input", function() {
                            this.value = this.value.replace(
                                /^0+|[^0-9kK]+/g,
                                ""
                            );
                        });

                    $.validator.addMethod(
                        "rut",
                        function(value, element) {
                            return (
                                this.optional(element) || $.Rut.validar(value)
                            );
                        },
                        "Este campo debe ser un rut válido."
                    );

                    // Validate Letters only

                    $(".input-letters-only").letters();

                    // $.validator.addMethod("input-letters-only", function(value, element) {
                    //   return this.optional(element) || /^[a-z\s]+$/i.test(value);
                    // }, "Solo puedes ingresar letras");

                    // Validate Numbers only

                    $(".input-numbers-only").numbers();

                    // $.validator.addMethod("input-numbers-only", function(value, element) {
                    //   return this.optional(element) || /^[0-9]*$/i.test(value);
                    // }, "Solo puedes ingresar números");

                    // Validate E-mail
                    // /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/

                    // $.validator.addMethod("input-email", function(value, element) {
                    //   return this.optional(element) || /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/i.test(value);
                    // }, "Dbees ingresar un email válido");

                    // Load Validate
                    $form.addClass("form-validate-load");

                    $fields.each(function(i, e) {
                        if (!$(e).hasClass("not-required")) {
                            $(e).prop("required", true);
                        }
                    });

                    let $errors = $form.find(".form-errors");

                    $errors.html("");

                    $form.validate({
                        rules: {
                            password: "required",
                            password_confirmation: {
                                equalTo: "#password"
                            }
                        },
                        ignore: ":not(:visible)",
                        errorContainer: $errors,
                        errorLabelContainer: $("div", $errors),
                        invalidHandler: function(form, validator) {
                            let errors;
                            return (errors = validator.numberOfInvalids());
                        },

                        submitHandler: function(form) {
                            // $submit.prop("disabled", true);
                            // $submit.html("<span>Enviado...</span>");
                            return true;
                        }
                    });
                }
            };

            let formAjax = function() {
                if (
                    $form.hasClass("form-ajax") &&
                    !$form.hasClass("form-ajax-load")
                ) {
                    $form.addClass("form-ajax-load");
                    $submit = $form.find('[type="submit"]');

                    // alert("disabled");

                    options = {
                        dataType: "JSON",
                        success: function(data, textStatus, jqXHR) {
                            const response = data.data;

                            if (response.success) {
                                $form[0].reset();
                                if($form.data('redirect')) {
                                    window.location.href = $form.data('redirect');
                                } else {
                                    $(".form__message").addClass("is-active");
    
                                    Swal.fire({
                                        icon: "success",
                                        title: "¡Gracias!",
                                        text: "Pronto nos pondremos en contacto"
                                    });
    
                                    $submit.prop("disabled", true);
                                }
                            }

                            try {
                                grecaptcha.reset();
                            } catch (err) {
                                console.log(err);
                            }
                        },
                        complete: function() {},
                        error: function(jqXHR) {
                            Swal.fire({
                                icon: "error",
                                title: jqXHR.status,
                                text: `${jqXHR.statusText}`
                            });
                        }
                    };

                    return $form.ajaxForm(options);
                }
            };

            let formReload = function() {
                if (
                    $form.hasClass("form-reload") &&
                    !$form.hasClass("form-reload-load")
                ) {
                    $form.addClass("form-reload-load");
                    $fields.prop("disabled", true);
                    $fields.each(function(i, e) {
                        let _name = $(e).attr("name");
                        let _queries = _queryString();
                        $(e).val(_queries[_name]);
                        $(e).prop("disabled", false);
                    });
                    $fields.change(function() {
                        $form.submit();
                    });
                    º;
                }
            };

            let formReCaptcha = function() {
                //console.log('recaptcha');

                if (
                    $form.hasClass("form-recaptcha") &&
                    !$form.hasClass("form-recaptcha-load")
                ) {
                    $form.addClass("form-recaptcha-load");
                    let _data_key = $form.attr("data-key");

                    let strRand = Math.random()
                        .toString(36)
                        .replace(/[^a-z]/g, "");
                    //console.log(strRand);

                    window[strRand] = function() {
                        $form.submit();
                    };

                    // -- Captcha
                    let captcha = document.createElement("div");
                    let $captcha = $(captcha)
                        .attr("data-sitekey", _data_key)
                        .attr("data-size", "invisible")
                        .attr("data-callback", strRand)
                        .attr("id", strRand)
                        .addClass("g-recaptcha");
                    $form.append($captcha);

                    // -- Script
                    if ($(".g-recaptcha").length === 1) {
                        let _url = "//www.google.com/recaptcha/api.js";
                        let script = document.createElement("script");
                        script.type = "text/javascript";
                        script.src = _url;
                        script.id = "google-recaptcha";
                        script.async = true;
                        script.defer = true;
                        script.render = "explicit";
                        document.body.appendChild(script);
                    }

                    $form.on("submit", function(e) {
                        let widgetId = $(".g-recaptcha").index($captcha);
                        if (
                            $form.is(":valid") &&
                            !grecaptcha.getResponse(widgetId)
                        ) {
                            e.preventDefault();
                            grecaptcha.execute(widgetId);
                        }
                    });
                }
            };

            let _queryString = function() {
                let query_string = {};
                let query = window.location.search.substring(1);
                let vars = query.split("&");
                for (let i = 0; i < vars.length; i++) {
                    let pair = vars[i].split("=");
                    if (typeof query_string[pair[0]] === "undefined") {
                        query_string[pair[0]] = decodeURIComponent(pair[1]);
                    } else if (typeof query_string[pair[0]] === "string") {
                        let arr = [
                            query_string[pair[0]],
                            decodeURIComponent(pair[1])
                        ];
                        query_string[pair[0]] = arr;
                    } else {
                        query_string[pair[0]].push(decodeURIComponent(pair[1]));
                    }
                }
                return query_string;
            };

            // -- Initializations
            formValidate();
            formReCaptcha();
            formAjax();
            formDisabled();
            formReload();
        };

        return this.each(function() {
            constructor($(this));
        });
    };
})(jQuery);
