# Generated by Django 2.0.2 on 2018-03-02 13:46

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('form', '0001_initial'),
    ]

    operations = [
        migrations.AlterField(
            model_name='procreport',
            name='muscle_2',
            field=models.CharField(blank=True, choices=[('left', 'L'), ('right', 'R'), ('', 'n/a')], default='', max_length=5),
        ),
    ]