from django import forms
from .models import *


class JQueryUIDatepickerWidget(forms.DateInput):
    def __init__(self, **kwargs):
        super(forms.DateInput, self).__init__(attrs={"size":10, "class": "dateinput"}, **kwargs)

    class Media:
        css = {"all":("http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/themes/redmond/jquery-ui.css",)}
        js = ("http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js",
              "http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/jquery-ui.min.js",)


class MedClerkPreSedForm(forms.ModelForm):
    patient = MedClerkPreSed.patient

    class Meta:
        model = MedClerkPreSed
        fields = '__all__'
        exclude = ['patient']
        widgets = {
            'met_time': JQueryUIDatepickerWidget,
            'oral_sedation_time': JQueryUIDatepickerWidget,
            'ametop_applied_time': JQueryUIDatepickerWidget,
        }


class ConcOfTreatmentForm(forms.ModelForm):
    patient = ConcOfTreatment.patient

    class Meta:
        model = ConcOfTreatment
        fields = '__all__'
        exclude = ['patient']
        widgets = {
            'date': JQueryUIDatepickerWidget,
            'last_injection': JQueryUIDatepickerWidget,
            'timeframe': JQueryUIDatepickerWidget,
        }