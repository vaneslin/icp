import datetime
from django.db import models
from django.utils import timezone


YES_NO_NA_CHOICES = (
        ('yes', 'Yes'),
        ('no', 'No'),
        ('', 'n/a'),
    )

YES_NO_CHOICES = (
        ('yes', 'Yes'),
        ('no', 'No'),
    )

LEFT_RIGHT_CHOICES = (
    ('left', 'L'),
    ('right', 'R'),
    ('', "n/a"),
)


class Patient(models.Model):
    first_name = models.CharField(max_length=100)
    last_name = models.CharField(max_length=100)
    patient_id = models.CharField(max_length=100)

    def name(self):
        return str(self.first_name + " " + self.last_name).upper()

    def __str__(self):
        return self.patient_id


class MedClerkPreSed(models.Model):
    patient = models.ForeignKey(Patient, on_delete=models.CASCADE, default=0)
    access_date = timezone.now()
    page = 11
    ABNORMAL_CHOICES = (
        ('normal', 'Normal'),
        ('abnormal', 'Abnormal'),
        ('', "n/a"),
    )
    clinician = models.CharField(max_length=200)
    current_health_status = models.TextField(
        help_text="Please Comment on URTI/Seizures/Flu/Bladder Incontinence/LRTI/Swallowing Difficulty",
        blank=True
    )
    met = models.CharField(
        max_length=3,
        choices=YES_NO_NA_CHOICES,
        default='no',
        blank=True
    )
    met_time = models.DateTimeField()
    record_medication_changes = models.TextField(
        help_text="Record Medication Changes Since Pre-Injection Assessment",
        blank=True
    )
    respiratory_examination_details = models.TextField(
        help_text="Respiratory Examination Details",
        blank=True
    )
    normal = models.CharField(
        max_length=8,
        choices=ABNORMAL_CHOICES,
        default=None,
        blank=True
    )
    fit_for_sedation = models.CharField(
        max_length=3,
        choices=YES_NO_CHOICES,
        default='no',
        blank=True
    )
    oral_sedation_time = models.DateTimeField()
    number_of_ametop_tubes_used = models.PositiveSmallIntegerField(default=0)
    ametop_applied_time = models.DateTimeField()
    reasons_for_cancellation = models.TextField(
        help_text="If Applicable, State Reasons for Cancellation",
        blank = True
    )
    follow_up_arrangements = models.TextField(
        help_text="Outline Follow Up Arrangements Below",
        blank = True
    )

    def __str__(self):
        return "Medical Clerking Pre-Sedation"


class ConcOfTreatment(models.Model):
    patient = models.ForeignKey(Patient, on_delete=models.CASCADE, default=0)
    access_date = timezone.now()
    page = 19
    completed_by = models.CharField(max_length=5, help_text="Initials")
    date = models.DateTimeField()
    last_injection = models.DateTimeField()
    summary_and_effectiveness_of_injection = models.TextField(
        help_text="Summary of Injection Results",
        blank=True
    )
    future_treatment_plan = models.TextField(
        help_text="Details of Future Treatment Plan",
        blank=True
    )
    reinjection = models.CharField(
        max_length=3,
        choices=YES_NO_CHOICES,
        default='no',
        blank=True
    )
    if_reinjection_yes = models.TextField(
        help_text="Reason for Re-injection",
        blank=True
    )
    timeframe = models.DateTimeField()
    admin_informed = models.CharField(
        max_length=3,
        choices=YES_NO_CHOICES,
        default='no',
        blank=True
    )
    if_reinjection_no = models.TextField(
        help_text="Reason Re-injection Not Indicated",
        blank=True
    )
    onward_referral_plan = models.TextField(
        blank=True
    )

    def __str__(self):
        return "Conclusion of Treatment"


class ProcReport(models.Model):
    patient = models.ForeignKey(Patient, on_delete=models.CASCADE, default=0)
    access_date = timezone.now()
    page = 12
    muscle_1 = models.CharField(
        max_length=5,
        choices=LEFT_RIGHT_CHOICES,
        default='',
        blank=True
    )
    muscle_2 = models.CharField(
        max_length=5,
        choices=LEFT_RIGHT_CHOICES,
        default='',
        blank=True
    )
    muscle_3 = models.CharField(
        max_length=5,
        choices=LEFT_RIGHT_CHOICES,
        default='',
        blank=True
    )
    muscle_4 = models.CharField(
        max_length=5,
        choices=LEFT_RIGHT_CHOICES,
        default='',
        blank=True
    )
    muscle_5 = models.CharField(
        max_length=5,
        choices=LEFT_RIGHT_CHOICES,
        default='',
        blank=True
    )
    muscle_6 = models.CharField(
        max_length=5,
        choices=LEFT_RIGHT_CHOICES,
        default='',
        blank=True
    )
    muscle_7 = models.CharField(
        max_length=5,
        choices=LEFT_RIGHT_CHOICES,
        default='',
        blank=True
    )
    muscle_8 = models.CharField(
        max_length=5,
        choices=LEFT_RIGHT_CHOICES,
        default='',
        blank=True
    )
    muscle_9 = models.CharField(
        max_length=5,
        choices=LEFT_RIGHT_CHOICES,
        default='',
        blank=True
    )
    muscle_10 = models.CharField(
        max_length=5,
        choices=LEFT_RIGHT_CHOICES,
        default='',
        blank=True
    )
    muscle_11 = models.CharField(
        max_length=5,
        choices=LEFT_RIGHT_CHOICES,
        default='',
        blank=True
    )
    muscle_12 = models.CharField(
        max_length=5,
        choices=LEFT_RIGHT_CHOICES,
        default='',
        blank=True
    )
    musc_inject_1 = models.TextField(blank=True)
    musc_inject_2 = models.TextField(blank=True)
    musc_inject_3 = models.TextField(blank=True)
    musc_inject_4 = models.TextField(blank=True)
    musc_inject_5 = models.TextField(blank=True)
    musc_inject_6 = models.TextField(blank=True)
    musc_inject_7 = models.TextField(blank=True)
    musc_inject_8 = models.TextField(blank=True)
    musc_inject_9 = models.TextField(blank=True)
    musc_inject_10 = models.TextField(blank=True)
    musc_inject_11 = models.TextField(blank=True)
    musc_inject_12 = models.TextField(blank=True)

    ultrasound_1 = models.CharField(
        max_length=3,
        choices=YES_NO_NA_CHOICES,
        default='',
        blank=True
    )
    ultrasound_2 = models.CharField(
        max_length=3,
        choices=YES_NO_NA_CHOICES,
        default='',
        blank=True
    )
    ultrasound_3 = models.CharField(
        max_length=3,
        choices=YES_NO_NA_CHOICES,
        default='',
        blank=True
    )
    ultrasound_4 = models.CharField(
        max_length=3,
        choices=YES_NO_NA_CHOICES,
        default='',
        blank=True
    )
    ultrasound_5 = models.CharField(
        max_length=3,
        choices=YES_NO_NA_CHOICES,
        default='',
        blank=True
    )
    ultrasound_6 = models.CharField(
        max_length=3,
        choices=YES_NO_NA_CHOICES,
        default='',
        blank=True
    )
    ultrasound_7 = models.CharField(
        max_length=3,
        choices=YES_NO_NA_CHOICES,
        default='',
        blank=True
    )
    ultrasound_8 = models.CharField(
        max_length=3,
        choices=YES_NO_NA_CHOICES,
        default='',
        blank=True
    )
    ultrasound_9 = models.CharField(
        max_length=3,
        choices=YES_NO_NA_CHOICES,
        default='',
        blank=True
    )
    ultrasound_10 = models.CharField(
        max_length=3,
        choices=YES_NO_NA_CHOICES,
        default='',
        blank=True
    )
    ultrasound_11 = models.CharField(
        max_length=3,
        choices=YES_NO_NA_CHOICES,
        default='',
        blank=True
    )
    ultrasound_12 = models.CharField(
        max_length=3,
        choices=YES_NO_NA_CHOICES,
        default='',
        blank=True
    )

    placement_1 = models.TextField(blank=True)
    placement_2 = models.TextField(blank=True)
    placement_3 = models.TextField(blank=True)
    placement_4 = models.TextField(blank=True)
    placement_5 = models.TextField(blank=True)
    placement_6 = models.TextField(blank=True)
    placement_7 = models.TextField(blank=True)
    placement_8 = models.TextField(blank=True)
    placement_9 = models.TextField(blank=True)
    placement_10 = models.TextField(blank=True)
    placement_11 = models.TextField(blank=True)
    placement_12 = models.TextField(blank=True)

    tolerated_1 = models.TextField(blank=True)
    tolerated_2 = models.TextField(blank=True)
    tolerated_3 = models.TextField(blank=True)
    tolerated_4 = models.TextField(blank=True)
    tolerated_5 = models.TextField(blank=True)
    tolerated_6 = models.TextField(blank=True)
    tolerated_7 = models.TextField(blank=True)
    tolerated_8 = models.TextField(blank=True)
    tolerated_9 = models.TextField(blank=True)
    tolerated_10 = models.TextField(blank=True)
    tolerated_11 = models.TextField(blank=True)
    tolerated_12 = models.TextField(blank=True)

    adverse_event = models.CharField(
        max_length=3,
        choices=YES_NO_NA_CHOICES,
        default='',
        blank=True
    )
    adverse_event_yes = models.TextField(blank=True)
    sedation_effective = models.CharField(
        max_length=3,
        choices=YES_NO_NA_CHOICES,
        default='',
        blank=True
    )
    sedation_effective_no = models.TextField(blank=True)
    initials = models.CharField(max_length=5)
    date = models.DateTimeField()
    def __str__(self):
        return "Procedure Report"


class Dysports(models.Model):
    patient = models.ForeignKey(Patient, on_delete=models.CASCADE, default=0)
    date = timezone.now()
    initials = models.CharField(max_length=100)
    childweight = models.DecimalField(max_digits=10,decimal_places=2)
    batchnumber = models.CharField(max_length=100)
    expirydate = models.DateTimeField()

    
    muscle1 = models.CharField(max_length=100,blank=True)
    dysportunit1 = models.DecimalField(max_digits=100,decimal_places=2,blank=True)
    Totaldysport1 = models.DecimalField(max_digits=100,decimal_places=2,blank=True)
    Mls1 = models.DecimalField(max_digits=100,decimal_places=2,blank=True)
    circle_side11 = models.TextField(blank=True)
    circle_side12 = models.TextField(blank=True)
    circle_side13 = models.TextField(blank=True)

    muscle2 = models.CharField(max_length=100,blank=True)
    dysportunit2 = models.DecimalField(max_digits=100,decimal_places=2,blank=True)
    Totaldysport2 = models.DecimalField(max_digits=100,decimal_places=2,blank=True)
    Mls2 = models.DecimalField(max_digits=100,decimal_places=2,blank=True)
    circle_side21 = models.TextField(blank=True)
    circle_side22 = models.TextField(blank=True)
    circle_side23 = models.TextField(blank=True)

    muscle3 = models.CharField(max_length=100,blank=True)
    dysportunit3 = models.DecimalField(max_digits=100,decimal_places=2,blank=True)
    Totaldysport3 = models.DecimalField(max_digits=100,decimal_places=2,blank=True)
    Mls3 = models.DecimalField(max_digits=100,decimal_places=2,blank=True)
    circle_side31 = models.TextField(blank=True)
    circle_side32 = models.TextField(blank=True)
    circle_side33 = models.TextField(blank=True)

    muscle4 = models.CharField(max_length=100,blank=True)
    dysportunit4 = models.DecimalField(max_digits=100,decimal_places=2,blank=True)
    Totaldysport4 = models.DecimalField(max_digits=100,decimal_places=2,blank=True)
    Mls4 = models.DecimalField(max_digits=100,decimal_places=2,blank=True)
    circle_side41 = models.TextField(blank=True)
    circle_side42 = models.TextField(blank=True)
    circle_side43 = models.TextField(blank=True)

    muscle5 = models.CharField(max_length=100,blank=True)
    dysportunit5 = models.DecimalField(max_digits=100,decimal_places=2,blank=True)
    Totaldysport5 = models.DecimalField(max_digits=100,decimal_places=2,blank=True)
    Mls5 = models.DecimalField(max_digits=100,decimal_places=2,blank=True)
    circle_side51 = models.TextField(blank=True)
    circle_side52 = models.TextField(blank=True)
    circle_side53 = models.TextField(blank=True)

    totaldose = models.DecimalField(max_digits=100,decimal_places=2,blank=True)
    totalunits = models.DecimalField(max_digits=100,decimal_places=2,blank=True)


    def __str__(self):
        return "Dysport Calculation Sheet"

class Consents(models.Model):
    cname = models.CharField(max_length=100)
    speciality = models.CharField(max_length=50)
    csignature = models.CharField(max_length=100)
    pname = models.CharField(max_length=100)
    psignature = models.CharField(max_length=100)
    parent = models.CharField(max_length=100)
    date = models.DateTimeField()
    relations = models.TextField(blank=True)
    def __str__(self):
        return "Consent to Photography or Video Recording"




