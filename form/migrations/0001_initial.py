# Generated by Django 2.0.2 on 2018-04-19 10:52

from django.db import migrations, models
import django.db.models.deletion
import form.validators


class Migration(migrations.Migration):

    initial = True

    dependencies = [
    ]

    operations = [
        migrations.CreateModel(
            name='ConcOfTreatment',
            fields=[
                ('id', models.AutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('completed_by', models.CharField(help_text='Initials', max_length=5)),
                ('date', models.DateField()),
                ('last_injection', models.DateField()),
                ('summary_and_effectiveness_of_injection', models.TextField(blank=True, help_text='Summary of Injection Results')),
                ('future_treatment_plan', models.TextField(blank=True, help_text='Details of Future Treatment Plan')),
                ('reinjection', models.CharField(blank=True, choices=[('yes', 'Yes'), ('no', 'No')], default='no', max_length=3)),
                ('if_reinjection_yes', models.TextField(blank=True, help_text='Reason for Re-injection')),
                ('timeframe', models.DateField()),
                ('admin_informed', models.CharField(blank=True, choices=[('yes', 'Yes'), ('no', 'No')], default='no', max_length=3)),
                ('if_reinjection_no', models.TextField(blank=True, help_text='Reason Re-injection Not Indicated')),
                ('onward_referral_plan', models.TextField(blank=True)),
            ],
        ),
        migrations.CreateModel(
            name='Consents',
            fields=[
                ('id', models.AutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('Clinician_name', models.CharField(max_length=100)),
                ('speciality', models.CharField(max_length=50)),
                ('Clinician_signature', models.CharField(max_length=100)),
                ('date', models.DateField()),
            ],
        ),
        migrations.CreateModel(
            name='Consentss',
            fields=[
                ('id', models.AutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('consent_1', models.BooleanField(help_text='I consent to photographs/video recordings being taken at for my/my child’s personal medical case-notes.')),
                ('consent_2', models.BooleanField(help_text='I consent to photographs/video recordings being made available for teaching in the Healthcare context as described above.')),
                ('consent_3', models.BooleanField(help_text='I consent to photographs/video recordings being published for the specific purpose described below. This consent does not extend to any further publications. ')),
                ('patient_signature', models.CharField(max_length=100)),
                ('parent', models.CharField(max_length=100)),
                ('date', models.DateField()),
                ('relations', models.TextField(blank=True)),
            ],
        ),
        migrations.CreateModel(
            name='Dysports',
            fields=[
                ('id', models.AutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('date', models.DateField()),
                ('initials', models.CharField(max_length=100)),
                ('childweight', models.DecimalField(decimal_places=2, max_digits=10)),
                ('batchnumber', models.CharField(max_length=100)),
                ('expirydate', models.DateField()),
                ('muscle1', models.CharField(blank=True, max_length=100)),
                ('dysportunit1', models.DecimalField(decimal_places=2, max_digits=100, null=True)),
                ('Totaldysport1', models.DecimalField(decimal_places=2, max_digits=100, null=True)),
                ('mls1', models.DecimalField(decimal_places=2, max_digits=100, null=True)),
                ('circle_side11', models.TextField(blank=True)),
                ('circle_side12', models.TextField(blank=True)),
                ('circle_side13', models.TextField(blank=True)),
                ('muscle2', models.CharField(blank=True, max_length=100)),
                ('dysportunit2', models.DecimalField(decimal_places=2, max_digits=100, null=True)),
                ('Totaldysport2', models.DecimalField(decimal_places=2, max_digits=100, null=True)),
                ('mls2', models.DecimalField(decimal_places=2, max_digits=100, null=True)),
                ('circle_side21', models.TextField(blank=True)),
                ('circle_side22', models.TextField(blank=True)),
                ('circle_side23', models.TextField(blank=True)),
                ('muscle3', models.CharField(blank=True, max_length=100)),
                ('dysportunit3', models.DecimalField(decimal_places=2, max_digits=100, null=True)),
                ('Totaldysport3', models.DecimalField(decimal_places=2, max_digits=100, null=True)),
                ('mls3', models.DecimalField(decimal_places=2, max_digits=100, null=True)),
                ('circle_side31', models.TextField(blank=True)),
                ('circle_side32', models.TextField(blank=True)),
                ('circle_side33', models.TextField(blank=True)),
                ('muscle4', models.CharField(blank=True, max_length=100)),
                ('dysportunit4', models.DecimalField(decimal_places=2, max_digits=100, null=True)),
                ('Totaldysport4', models.DecimalField(decimal_places=2, max_digits=100, null=True)),
                ('mls4', models.DecimalField(decimal_places=2, max_digits=100, null=True)),
                ('circle_side41', models.TextField(blank=True)),
                ('circle_side42', models.TextField(blank=True)),
                ('circle_side43', models.TextField(blank=True)),
                ('muscle5', models.CharField(blank=True, max_length=100)),
                ('dysportunit5', models.DecimalField(decimal_places=2, max_digits=100, null=True)),
                ('Totaldysport5', models.DecimalField(decimal_places=2, max_digits=100, null=True)),
                ('mls5', models.DecimalField(decimal_places=2, max_digits=100, null=True)),
                ('circle_side51', models.TextField(blank=True)),
                ('circle_side52', models.TextField(blank=True)),
                ('circle_side53', models.TextField(blank=True)),
                ('totaldose', models.DecimalField(decimal_places=2, max_digits=100, null=True)),
                ('totalunits', models.DecimalField(decimal_places=2, max_digits=100, null=True)),
            ],
        ),
        migrations.CreateModel(
            name='MedClerkPreSed',
            fields=[
                ('id', models.AutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('clinician', models.CharField(max_length=200)),
                ('current_health_status', models.TextField(blank=True, help_text='Please Comment on URTI/Seizures/Flu/Bladder Incontinence/LRTI/Swallowing Difficulty')),
                ('met', models.CharField(blank=True, choices=[('yes', 'Yes'), ('no', 'No'), ('', 'n/a')], default='no', max_length=3)),
                ('met_time', models.DateField()),
                ('record_medication_changes', models.TextField(blank=True, help_text='Record Medication Changes Since Pre-Injection Assessment')),
                ('respiratory_examination_details', models.TextField(blank=True, help_text='Respiratory Examination Details')),
                ('normal', models.CharField(blank=True, choices=[('normal', 'Normal'), ('abnormal', 'Abnormal'), ('', 'n/a')], default=None, max_length=8)),
                ('fit_for_sedation', models.CharField(blank=True, choices=[('yes', 'Yes'), ('no', 'No')], default='no', max_length=3)),
                ('oral_sedation_time', models.DateField()),
                ('number_of_ametop_tubes_used', models.PositiveSmallIntegerField(default=0)),
                ('ametop_applied_time', models.DateField()),
                ('reasons_for_cancellation', models.TextField(blank=True, help_text='If Applicable, State Reasons for Cancellation')),
                ('follow_up_arrangements', models.TextField(blank=True, help_text='Outline Follow Up Arrangements Below')),
            ],
        ),
        migrations.CreateModel(
            name='Patient',
            fields=[
                ('id', models.AutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('first_name', models.CharField(max_length=100)),
                ('last_name', models.CharField(max_length=100)),
                ('patient_id', models.CharField(max_length=100, unique=True, validators=[form.validators.val_pat_id])),
                ('date_of_birth', models.DateField(validators=[form.validators.valid_dob])),
            ],
        ),
        migrations.CreateModel(
            name='PostInject1',
            fields=[
                ('id', models.AutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('date', models.DateField(blank=True)),
                ('completed_by', models.CharField(max_length=5)),
                ('local_team_members', models.CharField(max_length=200)),
                ('weeks_postinj1', models.PositiveSmallIntegerField(default=0)),
                ('attending_clinicians', models.CharField(max_length=200)),
                ('attending_fam_car', models.CharField(max_length=200)),
                ('musc1_inj', models.CharField(max_length=200)),
                ('musc1_inj_n', models.BooleanField()),
                ('musc1_inj_p', models.BooleanField()),
                ('musc1_inj_y', models.BooleanField()),
                ('musc2_inj', models.CharField(max_length=200)),
                ('musc2_inj_n', models.BooleanField()),
                ('musc2_inj_p', models.BooleanField()),
                ('musc2_inj_y', models.BooleanField()),
                ('musc3_inj', models.CharField(max_length=200)),
                ('musc3_inj_n', models.BooleanField()),
                ('musc3_inj_p', models.BooleanField()),
                ('musc3_inj_y', models.BooleanField()),
                ('musc4_inj', models.CharField(max_length=200)),
                ('musc4_inj_n', models.BooleanField()),
                ('musc4_inj_p', models.BooleanField()),
                ('musc4_inj_y', models.BooleanField()),
                ('pain_0', models.BooleanField()),
                ('pain_2', models.BooleanField()),
                ('pain_4', models.BooleanField()),
                ('pain_6', models.BooleanField()),
                ('pain_8', models.BooleanField()),
                ('pain_10', models.BooleanField()),
                ('goal_1', models.TextField(blank=True)),
                ('goal_1_y', models.BooleanField()),
                ('goal_1_n', models.BooleanField()),
                ('goal_1_p', models.BooleanField()),
                ('goal_2', models.TextField(blank=True)),
                ('goal_2_y', models.BooleanField()),
                ('goal_2_n', models.BooleanField()),
                ('goal_2_p', models.BooleanField()),
                ('goal_3', models.TextField(blank=True)),
                ('goal_3_y', models.BooleanField()),
                ('goal_3_n', models.BooleanField()),
                ('goal_3_p', models.BooleanField()),
                ('goal_4', models.TextField(blank=True)),
                ('goal_4_y', models.BooleanField()),
                ('goal_4_n', models.BooleanField()),
                ('goal_4_p', models.BooleanField()),
                ('child_fam_goals', models.TextField()),
                ('therapy_intervention', models.TextField()),
                ('physical_activity', models.TextField()),
                ('family_opinions', models.TextField()),
                ('orth_changes_made', models.CharField(blank=True, choices=[('yes', 'Yes'), ('no', 'No'), ('', 'n/a')], max_length=3)),
                ('orth_changes', models.TextField(blank=True)),
                ('therapy_implemented_made', models.CharField(blank=True, choices=[('yes', 'Yes'), ('no', 'No'), ('', 'n/a')], max_length=3)),
                ('therapy_implemented', models.TextField(blank=True)),
                ('casting_complete_made', models.CharField(blank=True, choices=[('yes', 'Yes'), ('no', 'No'), ('', 'n/a')], default='', max_length=3)),
                ('casting_complete', models.TextField(blank=True)),
                ('day_case', models.TextField(blank=True)),
                ('side_effects_choices', models.CharField(blank=True, choices=[('yes', 'Yes'), ('no', 'No'), ('', 'n/a')], default='', max_length=3)),
                ('side_effects', models.TextField(blank=True)),
                ('pos_effects', models.TextField(blank=True)),
                ('neg_effects', models.TextField(blank=True)),
                ('changes_medical', models.TextField(blank=True)),
                ('date1', models.DateField()),
                ('completed_by1', models.CharField(max_length=5)),
                ('post_inj_examination', models.TextField(blank=True)),
                ('GMFM_A', models.CharField(blank=True, max_length=20)),
                ('GMFM_B', models.CharField(blank=True, max_length=20)),
                ('GMFM_C', models.CharField(blank=True, max_length=20)),
                ('GMFM_D', models.CharField(blank=True, max_length=20)),
                ('GMFM_E', models.CharField(blank=True, max_length=20)),
                ('AHA', models.CharField(max_length=200)),
                ('TUG', models.CharField(max_length=200)),
                ('MFWT', models.CharField(max_length=200)),
                ('post_inj_summary', models.TextField(blank=True)),
                ('date2', models.DateField(blank=True)),
                ('completed_by2', models.CharField(max_length=5)),
                ('patient', models.ForeignKey(default=0, on_delete=django.db.models.deletion.CASCADE, to='form.Patient')),
            ],
        ),
        migrations.CreateModel(
            name='PostInject2',
            fields=[
                ('id', models.AutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('date', models.DateField(blank=True)),
                ('completed_by', models.CharField(max_length=5)),
                ('local_team_members', models.CharField(max_length=200)),
                ('weeks_postinj1', models.PositiveSmallIntegerField(default=0)),
                ('attending_clinicians', models.CharField(max_length=200)),
                ('attending_fam_car', models.CharField(max_length=200)),
                ('musc1_inj', models.CharField(max_length=200)),
                ('musc1_inj_n', models.BooleanField()),
                ('musc1_inj_p', models.BooleanField()),
                ('musc1_inj_y', models.BooleanField()),
                ('musc2_inj', models.CharField(max_length=200)),
                ('musc2_inj_n', models.BooleanField()),
                ('musc2_inj_p', models.BooleanField()),
                ('musc2_inj_y', models.BooleanField()),
                ('musc3_inj', models.CharField(max_length=200)),
                ('musc3_inj_n', models.BooleanField()),
                ('musc3_inj_p', models.BooleanField()),
                ('musc3_inj_y', models.BooleanField()),
                ('musc4_inj', models.CharField(max_length=200)),
                ('musc4_inj_n', models.BooleanField()),
                ('musc4_inj_p', models.BooleanField()),
                ('musc4_inj_y', models.BooleanField()),
                ('pain_0', models.BooleanField()),
                ('pain_2', models.BooleanField()),
                ('pain_4', models.BooleanField()),
                ('pain_6', models.BooleanField()),
                ('pain_8', models.BooleanField()),
                ('pain_10', models.BooleanField()),
                ('goal_1', models.TextField(blank=True)),
                ('goal_1_y', models.BooleanField()),
                ('goal_1_n', models.BooleanField()),
                ('goal_1_p', models.BooleanField()),
                ('goal_2', models.TextField(blank=True)),
                ('goal_2_y', models.BooleanField()),
                ('goal_2_n', models.BooleanField()),
                ('goal_2_p', models.BooleanField()),
                ('goal_3', models.TextField(blank=True)),
                ('goal_3_y', models.BooleanField()),
                ('goal_3_n', models.BooleanField()),
                ('goal_3_p', models.BooleanField()),
                ('goal_4', models.TextField(blank=True)),
                ('goal_4_y', models.BooleanField()),
                ('goal_4_n', models.BooleanField()),
                ('goal_4_p', models.BooleanField()),
                ('child_fam_goals', models.TextField()),
                ('therapy_intervention', models.TextField()),
                ('physical_activity', models.TextField()),
                ('family_opinions', models.TextField()),
                ('orth_changes_made', models.CharField(blank=True, choices=[('yes', 'Yes'), ('no', 'No'), ('', 'n/a')], max_length=3)),
                ('orth_changes', models.TextField(blank=True)),
                ('therapy_implemented_made', models.CharField(blank=True, choices=[('yes', 'Yes'), ('no', 'No'), ('', 'n/a')], max_length=3)),
                ('therapy_implemented', models.TextField(blank=True)),
                ('casting_complete_made', models.CharField(blank=True, choices=[('yes', 'Yes'), ('no', 'No'), ('', 'n/a')], default='', max_length=3)),
                ('casting_complete', models.TextField(blank=True)),
                ('day_case', models.TextField(blank=True)),
                ('side_effects_choices', models.CharField(blank=True, choices=[('yes', 'Yes'), ('no', 'No'), ('', 'n/a')], default='', max_length=3)),
                ('side_effects', models.TextField(blank=True)),
                ('pos_effects', models.TextField(blank=True)),
                ('neg_effects', models.TextField(blank=True)),
                ('changes_medical', models.TextField(blank=True)),
                ('date1', models.DateField()),
                ('completed_by1', models.CharField(max_length=5)),
                ('post_inj_examination', models.TextField(blank=True)),
                ('GMFM_A', models.CharField(blank=True, max_length=20)),
                ('GMFM_B', models.CharField(blank=True, max_length=20)),
                ('GMFM_C', models.CharField(blank=True, max_length=20)),
                ('GMFM_D', models.CharField(blank=True, max_length=20)),
                ('GMFM_E', models.CharField(blank=True, max_length=20)),
                ('AHA', models.CharField(max_length=200)),
                ('TUG', models.CharField(max_length=200)),
                ('MFWT', models.CharField(max_length=200)),
                ('post_inj_summary', models.TextField(blank=True)),
                ('date2', models.DateField(blank=True)),
                ('completed_by2', models.CharField(max_length=5)),
                ('patient', models.ForeignKey(default=0, on_delete=django.db.models.deletion.CASCADE, to='form.Patient')),
            ],
        ),
        migrations.CreateModel(
            name='ProcReport',
            fields=[
                ('id', models.AutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('muscle_1', models.CharField(blank=True, choices=[('left', 'L'), ('right', 'R'), ('', 'n/a')], default='', max_length=5)),
                ('muscle_2', models.CharField(blank=True, choices=[('left', 'L'), ('right', 'R'), ('', 'n/a')], default='', max_length=5)),
                ('muscle_3', models.CharField(blank=True, choices=[('left', 'L'), ('right', 'R'), ('', 'n/a')], default='', max_length=5)),
                ('muscle_4', models.CharField(blank=True, choices=[('left', 'L'), ('right', 'R'), ('', 'n/a')], default='', max_length=5)),
                ('muscle_5', models.CharField(blank=True, choices=[('left', 'L'), ('right', 'R'), ('', 'n/a')], default='', max_length=5)),
                ('muscle_6', models.CharField(blank=True, choices=[('left', 'L'), ('right', 'R'), ('', 'n/a')], default='', max_length=5)),
                ('muscle_7', models.CharField(blank=True, choices=[('left', 'L'), ('right', 'R'), ('', 'n/a')], default='', max_length=5)),
                ('muscle_8', models.CharField(blank=True, choices=[('left', 'L'), ('right', 'R'), ('', 'n/a')], default='', max_length=5)),
                ('muscle_9', models.CharField(blank=True, choices=[('left', 'L'), ('right', 'R'), ('', 'n/a')], default='', max_length=5)),
                ('muscle_10', models.CharField(blank=True, choices=[('left', 'L'), ('right', 'R'), ('', 'n/a')], default='', max_length=5)),
                ('muscle_11', models.CharField(blank=True, choices=[('left', 'L'), ('right', 'R'), ('', 'n/a')], default='', max_length=5)),
                ('muscle_12', models.CharField(blank=True, choices=[('left', 'L'), ('right', 'R'), ('', 'n/a')], default='', max_length=5)),
                ('musc_inject_1', models.TextField(blank=True)),
                ('musc_inject_2', models.TextField(blank=True)),
                ('musc_inject_3', models.TextField(blank=True)),
                ('musc_inject_4', models.TextField(blank=True)),
                ('musc_inject_5', models.TextField(blank=True)),
                ('musc_inject_6', models.TextField(blank=True)),
                ('musc_inject_7', models.TextField(blank=True)),
                ('musc_inject_8', models.TextField(blank=True)),
                ('musc_inject_9', models.TextField(blank=True)),
                ('musc_inject_10', models.TextField(blank=True)),
                ('musc_inject_11', models.TextField(blank=True)),
                ('musc_inject_12', models.TextField(blank=True)),
                ('ultrasound_1', models.CharField(blank=True, choices=[('yes', 'Yes'), ('no', 'No'), ('', 'n/a')], default='', max_length=3)),
                ('ultrasound_2', models.CharField(blank=True, choices=[('yes', 'Yes'), ('no', 'No'), ('', 'n/a')], default='', max_length=3)),
                ('ultrasound_3', models.CharField(blank=True, choices=[('yes', 'Yes'), ('no', 'No'), ('', 'n/a')], default='', max_length=3)),
                ('ultrasound_4', models.CharField(blank=True, choices=[('yes', 'Yes'), ('no', 'No'), ('', 'n/a')], default='', max_length=3)),
                ('ultrasound_5', models.CharField(blank=True, choices=[('yes', 'Yes'), ('no', 'No'), ('', 'n/a')], default='', max_length=3)),
                ('ultrasound_6', models.CharField(blank=True, choices=[('yes', 'Yes'), ('no', 'No'), ('', 'n/a')], default='', max_length=3)),
                ('ultrasound_7', models.CharField(blank=True, choices=[('yes', 'Yes'), ('no', 'No'), ('', 'n/a')], default='', max_length=3)),
                ('ultrasound_8', models.CharField(blank=True, choices=[('yes', 'Yes'), ('no', 'No'), ('', 'n/a')], default='', max_length=3)),
                ('ultrasound_9', models.CharField(blank=True, choices=[('yes', 'Yes'), ('no', 'No'), ('', 'n/a')], default='', max_length=3)),
                ('ultrasound_10', models.CharField(blank=True, choices=[('yes', 'Yes'), ('no', 'No'), ('', 'n/a')], default='', max_length=3)),
                ('ultrasound_11', models.CharField(blank=True, choices=[('yes', 'Yes'), ('no', 'No'), ('', 'n/a')], default='', max_length=3)),
                ('ultrasound_12', models.CharField(blank=True, choices=[('yes', 'Yes'), ('no', 'No'), ('', 'n/a')], default='', max_length=3)),
                ('placement_1', models.TextField(blank=True)),
                ('placement_2', models.TextField(blank=True)),
                ('placement_3', models.TextField(blank=True)),
                ('placement_4', models.TextField(blank=True)),
                ('placement_5', models.TextField(blank=True)),
                ('placement_6', models.TextField(blank=True)),
                ('placement_7', models.TextField(blank=True)),
                ('placement_8', models.TextField(blank=True)),
                ('placement_9', models.TextField(blank=True)),
                ('placement_10', models.TextField(blank=True)),
                ('placement_11', models.TextField(blank=True)),
                ('placement_12', models.TextField(blank=True)),
                ('tolerated_1', models.TextField(blank=True)),
                ('tolerated_2', models.TextField(blank=True)),
                ('tolerated_3', models.TextField(blank=True)),
                ('tolerated_4', models.TextField(blank=True)),
                ('tolerated_5', models.TextField(blank=True)),
                ('tolerated_6', models.TextField(blank=True)),
                ('tolerated_7', models.TextField(blank=True)),
                ('tolerated_8', models.TextField(blank=True)),
                ('tolerated_9', models.TextField(blank=True)),
                ('tolerated_10', models.TextField(blank=True)),
                ('tolerated_11', models.TextField(blank=True)),
                ('tolerated_12', models.TextField(blank=True)),
                ('adverse_event', models.CharField(blank=True, choices=[('yes', 'Yes'), ('no', 'No'), ('', 'n/a')], default='', max_length=3)),
                ('adverse_event_yes', models.TextField(blank=True)),
                ('sedation_effective', models.CharField(blank=True, choices=[('yes', 'Yes'), ('no', 'No'), ('', 'n/a')], default='', max_length=3)),
                ('sedation_effective_no', models.TextField(blank=True)),
                ('initials', models.CharField(max_length=5)),
                ('date', models.DateField()),
                ('patient', models.ForeignKey(default=0, on_delete=django.db.models.deletion.CASCADE, to='form.Patient')),
            ],
        ),
        migrations.AddField(
            model_name='medclerkpresed',
            name='patient',
            field=models.ForeignKey(default=0, on_delete=django.db.models.deletion.CASCADE, to='form.Patient'),
        ),
        migrations.AddField(
            model_name='dysports',
            name='patient',
            field=models.ForeignKey(default=0, on_delete=django.db.models.deletion.CASCADE, to='form.Patient'),
        ),
        migrations.AddField(
            model_name='consentss',
            name='patient',
            field=models.ForeignKey(default=0, on_delete=django.db.models.deletion.CASCADE, to='form.Patient'),
        ),
        migrations.AddField(
            model_name='consents',
            name='patient',
            field=models.ForeignKey(default=0, on_delete=django.db.models.deletion.CASCADE, to='form.Patient'),
        ),
        migrations.AddField(
            model_name='concoftreatment',
            name='patient',
            field=models.ForeignKey(default=0, on_delete=django.db.models.deletion.CASCADE, to='form.Patient'),
        ),
    ]
