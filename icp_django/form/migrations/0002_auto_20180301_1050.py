# Generated by Django 2.0.2 on 2018-03-01 10:50

from django.db import migrations


class Migration(migrations.Migration):

    dependencies = [
        ('form', '0001_initial'),
    ]

    operations = [
        migrations.RemoveField(
            model_name='numberanswer',
            name='question',
        ),
        migrations.RemoveField(
            model_name='page',
            name='form',
        ),
        migrations.RemoveField(
            model_name='question',
            name='page',
        ),
        migrations.RemoveField(
            model_name='textanswer',
            name='question',
        ),
        migrations.DeleteModel(
            name='Form',
        ),
        migrations.DeleteModel(
            name='NumberAnswer',
        ),
        migrations.DeleteModel(
            name='Page',
        ),
        migrations.DeleteModel(
            name='Question',
        ),
        migrations.DeleteModel(
            name='TextAnswer',
        ),
    ]
