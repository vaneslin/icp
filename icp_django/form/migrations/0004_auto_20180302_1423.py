# Generated by Django 2.0.2 on 2018-03-02 14:23

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('form', '0003_auto_20180302_1408'),
    ]

    operations = [
        migrations.AlterField(
            model_name='procreport',
            name='adverse_event_yes',
            field=models.TextField(blank=True),
        ),
        migrations.AlterField(
            model_name='procreport',
            name='sedation_effective_no',
            field=models.TextField(blank=True),
        ),
    ]