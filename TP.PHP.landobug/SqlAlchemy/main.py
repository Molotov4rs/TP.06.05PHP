from sqlalchemy import create_engine, MetaData, inspect
from sqlalchemy.orm import sessionmaker
from sqlalchemy.ext.declarative import declarative_base
from sqlalchemy import Column, Integer, String, DateTime, ForeignKey
from sqlalchemy.orm import relationship

# Define the Base
Base = declarative_base()

# Define the database models
class Console(Base):
    __tablename__ = 'console'

    id = Column(Integer, primary_key=True)
    label = Column(String(150), nullable=False)

class Jeu(Base):
    __tablename__ = 'jeu'

    id = Column(Integer, primary_key=True)
    titre = Column(String(150), nullable=False)
    description = Column(String, nullable=False)
    prix = Column(Integer, nullable=False)
    date_sortie = Column(DateTime, nullable=False)
    image_path = Column(String(150), default='default.png')
    note_id = Column(Integer, ForeignKey('note.id'), nullable=False)
    age_id = Column(Integer, ForeignKey('restriction_age.id'), nullable=False)

    # Define relationships
    note = relationship("Note", back_populates="jeux")
    restriction_age = relationship("RestrictionAge", back_populates="jeux")

class Note(Base):
    __tablename__ = 'note'

    id = Column(Integer, primary_key=True)
    note_media = Column(Integer, nullable=False)
    note_utilisateur = Column(Integer, nullable=False)

    # Define relationships
    jeux = relationship("Jeu", back_populates="note")

class RestrictionAge(Base):
    __tablename__ = 'restriction_age'

    id = Column(Integer, primary_key=True)
    label = Column(Integer, nullable=False)
    image_path = Column(String(150), nullable=False)

    # Define relationships
    jeux = relationship("Jeu", back_populates="restriction_age")

def inspect_database(engine):
    # Inspect tables in the database
    inspector = inspect(engine)

    # Get a list of table names
    table_names = inspector.get_table_names()
    print("Liste des tables dans la base de données :")
    print(table_names)

    # Iterate through tables to get information about columns
    print("\nInformations sur les colonnes de chaque table :")
    for table_name in table_names:
        columns = inspector.get_columns(table_name)
        print(f"\nTable: {table_name}")
        for column in columns:
            print(f" - Column: {column['name']}, Type: {column['type']}")

def render_videogame(videogame):
    print(f"Title: {videogame.titre}")
    print(f"Description: {videogame.description}")
    print(f"Price: {videogame.prix}€")
    print(f"Release Date: {videogame.date_sortie}")
    print(f"Image Path: {videogame.image_path}")
    print(f"Note ID: {videogame.note_id}")
    print(f"Age ID: {videogame.age_id}")

def render_console(console):
    print(f"Console ID: {console.id}")
    print(f"Console Label: {console.label}")

def render_note(note):
    print(f"Note ID: {note.id}")
    print(f"Media Note: {note.note_media}")
    print(f"User Note: {note.note_utilisateur}")

def render_age_restriction(age_restriction):
    print(f"Age Restriction ID: {age_restriction.id}")
    print(f"Age Label: {age_restriction.label}")
    print(f"Image Path: {age_restriction.image_path}")

def main():
    # Replace 'admin', 'admin', and 'video-games' with your actual connection information
    engine = create_engine('mysql://admin:admin@localhost/video-games')

    # Call the function to inspect the database
    inspect_database(engine)

    # Create a session to interact with the database
    Session = sessionmaker(bind=engine)
    session = Session()

    # Query the database for consoles
    consoles = session.query(Console).all()

    # Render each console
    print("\nConsoles:")
    for console in consoles:
        render_console(console)

    # Query the database for notes
    notes = session.query(Note).all()

    # Render each note
    print("\nNotes:")
    for note in notes:
        render_note(note)

    # Query the database for age restrictions
    age_restrictions = session.query(RestrictionAge).all()

    # Render each age restriction
    print("\nAge Restrictions:")
    for age_restriction in age_restrictions:
        render_age_restriction(age_restriction)

    # Query the database for toys
    toys = session.query(Jeu).all()

    # Render each toy
    print("\nToys:")
    for toy in toys:
        render_videogame(toy)

if __name__ == "__main__":
    main()
