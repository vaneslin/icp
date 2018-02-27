
import datetime
from django.db import models
from django.utils import timezone


class MedClerkPreSed(models.Model):
    YES_NO_NA_CHOICES = (
        ('yes', 'Yes'),
        ('no', 'No'),
        ('na', "n/a"),
    )
    YES_NO_CHOICES = (
        ('yes', 'Yes'),
        ('no', 'No'),
    )
    ABNORMAL_CHOICES = (
        ('normal', 'Normal'),
        ('abnormal', 'Abnormal'),
        ('na', "n/a"),
    )
    clinician = models.CharField(max_length=200)
    current_health_status = models.TextField(
        help_text="Please Comment on URTI/Seizures/Flu/Bladder Incontinence/LRTI/Swallowing Difficulty"
    )
    met = models.CharField(
        max_length=3,
        choices=YES_NO_NA_CHOICES,
        default='no',
    )
    met_time = models.DateTimeField()
    record_medication_changes = models.TextField(
        help_text="Record Medication Changes Since Pre-Injection Assessment"
    )
    respiratory_examination_details = models.TextField(
        help_text="Respiratory Examination Details"
    )
    normal = models.CharField(
        max_length=8,
        choices=ABNORMAL_CHOICES,
        default='na',
    )
    fit_for_sedation = models.CharField(
        max_length=3,
        choices=YES_NO_CHOICES,
        default='no',
    )
    oral_sedation_time = models.DateTimeField()
    number_of_ametop_tubes_used = models.PositiveSmallIntegerField()
    ametop_applied_time = models.DateTimeField()
    reasons_for_cancellation = models.TextField(
        help_text="If Applicable, State Reasons for Cancellation"
    )
    follow_up_arrangements = models.TextField(
        help_text="Outline Follow Up Arrangements Below"
    )


class User(models.Model):
    pass


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






