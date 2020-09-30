var regUrl = "/student/register";

var specificRules = {
    // simple rule, converted to {required:true}
    parent_guardian_phone: {
        required: false,
        digits: true,
        maxlength: 11,
        minlength:11
    },
    name_of_school: "required",
    state_of_school: {
        required: true,
        lettersonly: true
    },
    course: "required",
};
