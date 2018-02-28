
import datetime
from django.db import models
from django.utils import timezone


YES_NO_NA_CHOICES = (
        ('yes', 'Yes'),
        ('no', 'No'),
        ('na', "n/a"),
    )

YES_NO_CHOICES = (
        ('yes', 'Yes'),
        ('no', 'No'),
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
        ('na', "n/a"),
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
        default='na',
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


class Form(models.Model):
    user_text = models.CharField(max_length=200)

    def __str__(self):
        return self.user_text


class Page(models.Model):
    form = models.ForeignKey(Form, on_delete=models.CASCADE)
    page_number = models.IntegerField(default=0)

    def __str__(self):
        return str(self.page_number)


class Question(models.Model):
    page = models.ForeignKey(Page, on_delete=models.CASCADE, default=0)
    question_text = models.CharField(max_length=200)
    pub_date = models.DateTimeField('date published')

    def __str__(self):
        return self.question_text

    def was_published_recently(self):
        return self.pub_date >= timezone.now() - datetime.timedelta(days=1)


class NumberAnswer(models.Model):
    question = models.ForeignKey(Question, on_delete=models.CASCADE)
    number_input = models.IntegerField(default=0)

    def __str__(self):
        return self.number_input


class TextAnswer(models.Model):
    question = models.ForeignKey(Question, on_delete=models.CASCADE)
    text_input = models.CharField(max_length=200)

    def __str__(self):
        return self.text_input






