from sqlalchemy import create_engine, MetaData, inspect
from sqlalchemy.orm import sessionmaker

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

def main():
    # Replace 'admin', 'admin', and 'bdd_video_games' with your actual connection information
    engine = create_engine('mysql://admin:admin@localhost/bdd_video_games')

    # Call the function to inspect the database
    inspect_database(engine)

    # Create a session to interact with the database
    Session = sessionmaker(bind=engine)
    session = Session()

    # Create a MetaData object to retrieve information about tables
    metadata = MetaData(bind=engine)

    # Define the tables from the database
    console_table = metadata.tables['console']
    jeu_table = metadata.tables['jeu']
    note_table = metadata.tables['note']
    restriction_age_table = metadata.tables['restriction_age']

if __name__ == "__main__":
    main()


