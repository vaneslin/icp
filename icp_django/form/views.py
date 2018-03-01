from django.http import HttpResponse
from django.template import loader
from django.shortcuts import render, get_object_or_404
from django.utils import timezone
from .models import Question, TextAnswer, NumberAnswer
from .forms import *


def index(request):
    questions = Question.objects.all()
    template = loader.get_template('form/index.html')
    context = {'questions': questions}
    return render(request, 'form/index.html', context)


def detail(request, question_id):
    return HttpResponse("You're looking at question %s." % question_id)


def results(request, question_id):
    response = "You're looking at the results of question %s."
    return HttpResponse(response % question_id)


def get_patient_dashboard(request):
    return render(request, 'form/index.html')


def add_patient(request):
    patients = Patient.objects.all()
    if request.method == "POST":
        form = PatientForm(request.POST)
        if form.is_valid():
            patient = form.save(commit=False)
            patient.access_date = timezone.now()
            patient.save()
    else:
        form = PatientForm()
    return render(request, 'form/patient_dashboard.html', {'form': form, 'patients': patients})


def get_med_clerk_pre_sed(request, patient_id):
    pat = get_object_or_404(Patient, patient_id=patient_id)
    try:
        # fetch MedClerk page for patient pat
        med = MedClerkPreSed.objects.get(patient=pat)
    except Exception:
        # pat has not created a MedClerk page yet
        med = None
    if request.method == "POST":
        # filling in the form
        form = MedClerkPreSedForm(request.POST or None, instance=med)
        if form.is_valid():
            medclerkpresed = form.save(commit=False)
            medclerkpresed.patient = get_object_or_404(Patient, patient_id=patient_id)
            medclerkpresed.access_date = timezone.now()
            medclerkpresed.save()
    elif med is not None:
        # view existing/edit
        form = MedClerkPreSedForm(None, instance=med)
    else:
        # create new medclerk form
        form = MedClerkPreSedForm()
    return render(request, 'form/medclerk.html', {'form': form})
