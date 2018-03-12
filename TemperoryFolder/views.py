from django.shortcuts import render, get_object_or_404
from .forms import *


def add_patient(request):
    if request.method == "POST":
        form = PatientForm(request.POST)
        if form.is_valid():
            patient = form.save(commit=False)
            patient.access_date = timezone.now()
            patient.save()
    else:
        form = PatientForm()
    return render(request, 'form/patient_add.html', {'form': form})


def edit_patient(request):
    patients = Patient.objects.all()
    return render(request, 'form/patient_edit.html', {'patients': patients})


def get_patient_information(request, patient_id):
    pat = get_object_or_404(Patient, patient_id=patient_id)
    return render(request, 'form/patient_information.html', {'patient': pat, 'patient_id':patient_id})


def get_patient_dashboard(request):
    patients = Patient.objects.all()
    return render(request, 'form/patient_dashboard.html', {'patients':patients})


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
    return render(request, 'form/icp/11_medclerk.html', {'form': form, 'patient': pat})


def get_proc_report(request, patient_id):
    pat = get_object_or_404(Patient, patient_id=patient_id)
    try:
        proc = ProcReport.objects.get(patient=pat)
    except Exception:
        proc = None
    if request.method == "POST":
        form = ProcReportForm(request.POST or None, instance=proc)
        if form.is_valid():
            proc = form.save(commit=False)
            proc.patient = get_object_or_404(Patient, patient_id=patient_id)
            proc.access_date = timezone.now()
            proc.save()
    elif proc is not None:
        form = ProcReportForm(None, instance=proc)
    else:
        form = ProcReportForm()
    return render(request, 'form/icp/12_procedure_report.html', {'form': form, 'patient': pat})


def get_conc_of_treatment(request, patient_id):
    pat = get_object_or_404(Patient, patient_id=patient_id)
    try:
        conc = ConcOfTreatment.objects.get(patient=pat)
    except Exception:
        conc = None
    if request.method == "POST":
        form = ConcOfTreatmentForm(request.POST or None, instance=conc)
        if form.is_valid():
            concoftreat = form.save(commit=False)
            concoftreat.patient = get_object_or_404(Patient, patient_id=patient_id)
            concoftreat.access_date = timezone.now()
            concoftreat.save()
    elif conc is not None:
        form = ConcOfTreatmentForm(None, instance=conc)
    else:
        form = ConcOfTreatmentForm()
    return render(request, 'form/icp/19_conclusion_of_treatment.html', {'form': form, 'patient': pat})

def get_consents(request,patient_id):
    pat = get_object_or_404(Patient,patient_id=patient_id)
    try:
        cons = Consents.objects.get(patient=pat)
    except Exception:
        cons = None
    if request.method == "POST":
        form = consentsofporv(request.POST or None,instance=cons)
        if form.is_valid():
            consents = form.save(commit=False)
            consents.patient = get_object_or_404(Patient,patient_id=patient_id)
            consents.access_date = timezone.now()
            consents.save()
    elif cons is not None:
        form = consentsofporv(None,instance=cons)
    else:
        form = consentsofporv()
    return render(request,'form/icp/8_consent_to_photography_or_video_recording.html',{'form':form,'patient':pat})

def get_dysports(request,patient_id):
    pat = get_object_or_404(Patient,patient_id=patient_id)
    try:
        dys = Dysports.objects.get(patient=pat)
    except Exception:
        dys = None
    if request.method == "POST":
        form = Dysportsheet(request.POST or None,instance=dys)
        if form.is_valid():
            dysportsheet = form.save(commit=False)
            dysportsheet.patient = get_object_or_404(Patient,patient_id=patient_id)
            dysportsheet.access_date = timezone.now()
            dysportsheet.save()
    elif dys is not None:
        form = Dysportsheet(None,instance=dys)
    else:
        form = Dysportsheet()
    return render(request,'form/icp/9_dysport_calculation_sheet.html',{'form':form,'patient':pat})
    